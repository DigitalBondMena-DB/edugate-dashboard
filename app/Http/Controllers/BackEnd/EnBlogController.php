<?php

namespace App\Http\Controllers\BackEnd;

use Carbon\Carbon;
use App\Models\EnBlog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\NewArticleSubCatrgory;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EnBlogController extends Controller
{

    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index(Request $request)
    {
        $search   = trim((string) $request->get('q', ''));
        $subId    = $request->get('sub_category_id');
        $status   = $request->get('status');

        $rows = EnBlog::select(
            'id',
            'title',
            'slug',
            'status',
            'image',
            'new_article_sub_catrgory_id'
        )
            ->with(['new_article_sub_catrgory:id,en_title'])
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('title', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%");
                });
            })
            ->when($subId && $subId !== '0', function ($q) use ($subId) {
                $q->where('new_article_sub_catrgory_id', $subId);
            })
            ->when($status !== null && $status !== '', function ($q) use ($status) {
                $q->where('status', $status);
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $subCategories = NewArticleSubCatrgory::select('id', 'en_title')
            ->orderBy('en_title')->get();

        return view('dashboard.enBlogs.index', compact('rows', 'subCategories', 'search', 'subId', 'status'));
    }

    public function create()
    {
        $categoreies = NewArticleSubCatrgory::get();
        return view('dashboard.enBlogs.create', compact('categoreies'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateStore($request);

        $schedule    = $this->combineSchedule($validated['schedule_date'] ?? null, $validated['schedule_time'] ?? null);
        $slug = Str::slug((string) ($validated['title'] ?? ''));

        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->imageService->handle($request->file('image'), 'enBlogs', null);
        }

        $payload = array_merge($validated, [
            'slug' => $slug,
            'image' => $image,
            'schedule_date' => $schedule,
            'article_date' => $validated['schedule_date'] ?? null,
            'article_counter' => 0,
        ]);

        $article = EnBlog::create($payload);

        Session::flash('flash_message', 'Blog added successfully!');
        return redirect()->route('enBlog.edit', $article->id);
    }

    public function edit($id)
    {
        $row = EnBlog::findOrFail($id);
        $categoreies = NewArticleSubCatrgory::get();

        return view('dashboard.enBlogs.edit', compact('row', 'categoreies'));
    }


    public function update(Request $request, $id)
    {
        $article   = EnBlog::findOrFail($id);
        $validated = $this->validateUpdate($request);

        $schedule    = $this->combineSchedule($validated['schedule_date'] ?? null, $validated['schedule_time'] ?? null);
        $slug = Str::slug((string) ($validated['title'] ?? ''));

        $image = $article->image;
        if ($request->hasFile('image')) {
            $image = $this->imageService->handle($request->file('image'), 'enBlogs', $image);
        }


        $payload = array_merge($validated, [
            'en_slug'        => $slug,
            'image'     => $image,
            'schedule_date'  => $schedule,
        ]);

        $article->update($payload);

        Session::flash('flash_message', 'Blog updated successfully!');
        return redirect()->route('enBlog.index');
    }

    public function toggleStatus(EnBlog $newArticle)
    {
        $newArticle->status = $newArticle->status === 1 ? 0 : 1;
        $newArticle->save();
        Session::flash('flash_message', "Article {$newArticle->status} successfully.");
        return redirect()->route('enBlog.index');
    }




    /* ===================== Helpers (Clean) ===================== */


    private function combineSchedule(?string $date, ?string $time): ?string
    {
        if (!$date) return null;
        $time = $time ?: '00:00';
        return $date . ' ' . $time;
    }

    private function makeArabicSlug(?string $text, string $sep = '-'): string
    {
        $text = trim((string)$text);
        $text = mb_strtolower($text, 'UTF-8');
        $text = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $text);
        $text = preg_replace("/[\s\-]+/", " ", $text);
        return preg_replace("/[\s_]/", $sep, $text);
    }


    private function validateStore(Request $request): array
    {
        $subTable = (new NewArticleSubCatrgory)->getTable();

        $rules = [
            'title'  => 'required|string|max:255',
            'text'   => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description'  => 'required|string|max:1000',

            'script_1'        => 'nullable|string',
            'script_2' => 'nullable|string',

            'schedule_date' => 'nullable|date|after_or_equal:today',
            'schedule_time' => 'nullable|date_format:H:i',

            'new_article_sub_catrgory_id' => "required|integer|exists:{$subTable},id",

            'status' => 'required|in:0,1',

            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:4096',
        ];

        $validator = Validator::make($request->all(), $rules, $this->messages(), $this->attributes());

        $validator->after(function ($v) use ($request) {
            if ($request->filled('schedule_date') && $request->filled('schedule_time')) {
                $today = Carbon::now('Africa/Cairo')->toDateString();
                if ($request->schedule_date === $today) {
                    $nowHM = Carbon::now('Africa/Cairo')->format('H:i');
                    if ($request->schedule_time < $nowHM) {
                        $v->errors()->add('schedule_time', 'Time must be now or later when date is today.');
                    }
                }
            }
        });

        return $validator->validate();
    }

    private function validateUpdate(Request $request): array
    {
        $subTable = (new NewArticleSubCatrgory)->getTable();

        $rules = [
            'title'  => 'required|string|max:255',

            'text'   => 'required|string',

            'meta_title' => 'required|string|max:255',

            'meta_description'  => 'required|string|max:1000',

            'script_1'        => 'nullable|string',
            'script_2' => 'nullable|string',

            'schedule_date' => 'nullable|date',
            'schedule_time' => 'nullable|date_format:H:i',

            'new_article_sub_catrgory_id' => "required|integer|exists:{$subTable},id",

            'status' => 'required|in:0,1',

            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
        ];

        $validator = Validator::make($request->all(), $rules, $this->messages(), $this->attributes());

        $validator->after(function ($v) use ($request) {
            if ($request->filled('schedule_date') && $request->filled('schedule_time')) {
                $today = Carbon::now('Africa/Cairo')->toDateString();
                if ($request->schedule_date === $today) {
                    $nowHM = Carbon::now('Africa/Cairo')->format('H:i');
                    if ($request->schedule_time < $nowHM) {
                        $v->errors()->add('schedule_time', 'Time must be now or later when date is today.');
                    }
                }
            }
        });

        return $validator->validate();
    }

    private function messages(): array
    {
        return [
            'required' => 'This field is required.',
            'max'      => 'Too long (max :max chars).',
            'date'     => 'Invalid date.',
            'date_format' => 'Invalid time format (HH:MM).',
            'after_or_equal' => 'Date must be today or later.',
            'image'    => 'File must be an image.',
            'mimes'    => 'Allowed types: :values',
            'max.file' => 'Max file size is :max KB.',
            'exists'   => 'Selected value is invalid.',
            'in'       => 'Invalid selection.',
            'array'    => 'Invalid list.',
            'integer'  => 'Invalid number.',
        ];
    }

    private function attributes(): array
    {
        return [
            'title'  => 'Title',
            'text'   => 'Text',
            'meta_title' => 'Meta Title',
            'meta_description'  => 'Meta Description',
            'script_1'  => 'Script 1',
            'script_2' => 'Script 2',
            'schedule_date' => 'publish date',
            'schedule_time' => 'publish time',
            'new_article_sub_catrgory_id' => 'sub category',
            'status' => 'status',
            'image' => 'image',
        ];
    }
}
