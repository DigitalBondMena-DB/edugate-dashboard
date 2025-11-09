<?php

namespace App\Http\Controllers\BackEnd;

use Carbon\Carbon;
use App\NewArticle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\NewArticleSubCatrgory;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class NewArticleController extends Controller
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

        $rows = NewArticle::select(
            'id',
            'ar_title',
            'ar_slug',
            'status',
            'main_image',
            'new_article_sub_catrgory_id'
        )
            ->with(['sub_category_data:id,ar_title'])
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('ar_title', 'like', "%{$search}%")
                        ->orWhere('ar_slug', 'like', "%{$search}%");
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

        $subCategories = NewArticleSubCatrgory::select('id', 'ar_title')
            ->orderBy('ar_title')->get();

        return view('dashboard.newArticles.index', compact('rows', 'subCategories', 'search', 'subId', 'status'));
    }

    public function create()
    {
        $categoreies = NewArticleSubCatrgory::get();
        return view('dashboard.newArticles.create', compact('categoreies'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateStore($request);

        $schedule    = $this->combineSchedule($validated['schedule_date'] ?? null, $validated['schedule_time'] ?? null);
        $arabicSlug  = $this->makeArabicSlug($validated['ar_title'] ?? null);

        $mainImageName = null;
        if ($request->hasFile('main_image')) {
            $mainImageName = $this->imageService->handle($request->file('main_image'), 'newArticle', null);
        }

        $payload = array_merge($validated, [
            'ar_slug'                     => $arabicSlug,
            'main_image'                  => $mainImageName,
            'schedule_date'               => $schedule,
            'article_date'                => $validated['schedule_date'] ?? null,
            'article_counter'             => 0,
        ]);

        $article = NewArticle::create($payload);

        Session::flash('flash_message', 'Article added successfully!');
        return redirect()->route('newArticle.edit', $article->id);
    }
    public function edit($id)
    {
        $row = NewArticle::findOrFail($id);
        $categoreies = NewArticleSubCatrgory::get();

        return view('dashboard.newArticles.edit', compact('row', 'categoreies'));
    }



    public function toggleStatus(NewArticle $newArticle)
    {
        $newArticle->status = $newArticle->status === 1 ? 0 : 1;
        $newArticle->save();
        $msg = $newArticle->status == 1 ? 'published' : 'unpublished';
        Session::flash('flash_message', "Article {$msg} successfully.");
        return redirect()->route('newArticle.index');
    }



    public function update(Request $request, $id)
    {
        $article   = NewArticle::findOrFail($id);
        $validated = $this->validateUpdate($request);

        $schedule    = $this->combineSchedule($validated['schedule_date'] ?? null, $validated['schedule_time'] ?? null);
        $arabicSlug  = $this->makeArabicSlug($validated['ar_title'] ?? null);

        $mainImageName = $article->main_image;
        if ($request->hasFile('main_image')) {
            $mainImageName = $this->imageService->handle($request->file('main_image'), 'newArticle', $mainImageName);
        }


        $payload = array_merge($validated, [
            'ar_slug'        => $arabicSlug,
            'main_image'     => $mainImageName,
            'schedule_date'  => $schedule,
        ]);

        $article->update($payload);

        Session::flash('flash_message', 'Article updated successfully!');
        return redirect()->route('newArticle.index');
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
            'ar_title'  => 'required|string|max:190',

            'ar_text'   => 'required|string',

            'ar_tag_title' => 'required|string|max:190',

            'ar_tag_desc'  => 'required|string|max:1000',

            'blog_script'        => 'nullable|string',
            'blog_second_script' => 'nullable|string',

            'schedule_date' => 'nullable|date|after_or_equal:today',
            'schedule_time' => 'nullable|date_format:H:i',

            'new_article_sub_catrgory_id' => "required|integer|exists:{$subTable},id",

            'status' => 'required|in:0,1',

            'main_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:4096',
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
            'ar_title'  => 'required|string|max:190',
            'ar_text'   => 'required|string',
            'ar_tag_title' => 'required|string|max:190',
            'ar_tag_desc'  => 'required|string|max:1000',
            'blog_script'        => 'nullable|string',
            'blog_second_script' => 'nullable|string',

            'schedule_date' => 'nullable|date',
            'schedule_time' => 'nullable|date_format:H:i',

            'new_article_sub_catrgory_id' => "required|integer|exists:{$subTable},id",

            'status' => 'required|in:0,1',

            'main_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
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
            'ar_title'  => 'Arabic title',
            'ar_text'   => 'Arabic text',
            'ar_tag_title' => 'Arabic tag title',
            'ar_tag_desc'  => 'Arabic tag description',
            'blog_script'  => 'Article script',
            'blog_second_script' => 'Article second script',
            'schedule_date' => 'publish date',
            'schedule_time' => 'publish time',
            'new_article_sub_catrgory_id' => 'sub category',
            'status' => 'status',
            'main_image' => 'main image',
        ];
    }
}
