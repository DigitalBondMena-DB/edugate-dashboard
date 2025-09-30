<?php

namespace App\Http\Controllers\BackEnd;

use Carbon\Carbon;
use App\NewArticle;
use App\NewArticleImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\NewArticleSubCatrgory;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;

// use App\Http\Requests\Backend\StoreNewArticleRequest;
// use App\Http\Requests\Backend\UpdateNewArticleRequest    ;


class NewArticleController extends Controller
{
    private const MAIN_DIR     = 'newArticle';
    private const GALLERY_DIR  = 'articleImages';
    private const WEBP_QUALITY = 75;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search   = trim((string) $request->get('q', ''));
        $subId    = $request->get('sub_category_id');
        $status   = $request->get('status');

        $rows = NewArticle::select(
            'id',
            'ar_title',
            'en_title',
            'ar_slug',
            'en_slug',
            'status',
            'main_image',
            'new_article_sub_catrgory_id'
        )
            ->with(['sub_category_data:id,ar_title,en_title'])
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('ar_title', 'like', "%{$search}%")
                        ->orWhere('en_title', 'like', "%{$search}%")
                        ->orWhere('ar_slug', 'like', "%{$search}%")
                        ->orWhere('en_slug', 'like', "%{$search}%");
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

        $subCategories = NewArticleSubCatrgory::select('id', 'ar_title', 'en_title')
            ->orderBy('ar_title')->get();

        return view('dashboard.newArticles.index', compact('rows', 'subCategories', 'search', 'subId', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoreies = NewArticleSubCatrgory::get();
        return view('dashboard.newArticles.create', compact('categoreies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    //     $dateNow = Carbon::now('Africa/Cairo')->format('Y-m-d');
    //     // dd($request->schedule_date , $request->schedule_time , $dateNow);

    //     if ($request->hasFile('main_image')) {
    //         $file = $request->file('main_image');
    //         $fileName = time() . str_random(10);
    //         $file = (string) Image::make($request->file('main_image'))->encode('webp', 75)->save(public_path('newArticle/' . $fileName, 'webp'));
    //         // $file->move(public_path('newArticle'), $fileName);

    //     }

    //     $newdate = $request->schedule_date . ' ' . $request->schedule_time;
    //     // dd($newdate);

    //     function make_slug($string, $separator = '-')
    //     {
    //         $string = trim($string);
    //         $string = mb_strtolower($string, 'UTF-8');

    //         $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

    //         // Remove multiple dashes or whitespaces or underscores
    //         $string = preg_replace("/[\s\-]+/", " ", $string);

    //         // Convert whitespaces and underscore to the given separator
    //         $string = preg_replace("/[\s_]/", $separator, $string);

    //         return $string;
    //     }

    //     $ar_slug = make_slug($request->ar_title);


    //     $ar_slug = make_slug($request->ar_title);

    //     $requestArray = [
    //         'en_slug' => Str::slug($request->en_title),
    //         'ar_slug' => $ar_slug,
    //         'main_image' =>  $fileName,

    //         'ar_tag_title' => $request->ar_tag_title,
    //         'schedule_date' => $newdate,
    //         'ar_tag_desc' => $request->ar_tag_desc,
    //         'new_article_catrgory_id' => $request->new_article_catrgory_id,
    //         'article_date' => $request->schedule_date,
    //         'blog_script' => $request->blog_script,
    //         'blog_second_script' => $request->blog_second_script,
    //         'status' => $request->status,
    //         'article_counter' => 0
    //     ] + $request->all();


    //     $row = NewArticle::create($requestArray);
    //     $arrayofimages =  $request->file('arrayOfImages');;
    //     // dd($arrayofimages);
    //     if ($arrayofimages) {
    //         foreach ($arrayofimages as $arrayofimage) {

    //             $fileName = time() . str_random(10);
    //             $file = (string) Image::make($arrayofimage)->encode('webp', 75)->save(public_path('articleImages/' . $fileName, 'webp'));


    //             // dd($arrayofimages);
    //             NewArticleImage::create([
    //                 'image' => $fileName,
    //                 'new_article_id' => $row->id,
    //                 'image_url' => 'articleImages/' . $fileName
    //             ]);
    //             // dd($arrayofimage);
    //         }
    //     }



    //     Session::flash('flash_message', 'Blog added successfully!');
    //     return redirect()->route('newArticle.edit', $row->id);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = NewArticle::findOrFail($id);
        $articleImages = NewArticleImage::where('new_article_id', $row->id)->get();
        $categoreies = NewArticleSubCatrgory::get();

        return view('dashboard.newArticles.edit', compact('row', 'articleImages', 'categoreies'));
    }



    public function toggleStatus(NewArticle $newArticle)
    {
        $newArticle->status = $newArticle->status === 1 ? 0 : 1;
        $newArticle->save();
        Session::flash('flash_message', "Article {$newArticle->status} successfully.");
        return redirect()->route('newArticle.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validateStore($request);

        $schedule    = $this->combineSchedule($validated['schedule_date'] ?? null, $validated['schedule_time'] ?? null);
        $arabicSlug  = $this->makeArabicSlug($validated['ar_title'] ?? null);
        $englishSlug = Str::slug((string) ($validated['en_title'] ?? ''));

        $mainImageName = null;
        if ($request->hasFile('main_image')) {
            if (!file_exists(public_path(self::MAIN_DIR))) {
                mkdir(public_path(self::MAIN_DIR), 0777, true);
            }
            $mainImageName = $this->saveWebp($request->file('main_image'), self::MAIN_DIR);
        }

        $payload = array_merge($validated, [
            'en_slug'                     => $englishSlug,
            'ar_slug'                     => $arabicSlug,
            'main_image'                  => $mainImageName,
            'schedule_date'               => $schedule,
            'article_date'                => $validated['schedule_date'] ?? null,
            'article_counter'             => 0,
        ]);

        $article = NewArticle::create($payload);

        if ($request->hasFile('arrayOfImages')) {
            if (!file_exists(public_path(self::GALLERY_DIR))) {
                mkdir(public_path(self::GALLERY_DIR), 0777, true);
            }
            $this->saveGallery($request->file('arrayOfImages'), $article->id);
        }

        Session::flash('flash_message', 'Blog added successfully!');
        return redirect()->route('newArticle.edit', $article->id);
    }

    public function update(Request $request, $id)
    {
        $article   = NewArticle::findOrFail($id);
        $validated = $this->validateUpdate($request);

        $schedule    = $this->combineSchedule($validated['schedule_date'] ?? null, $validated['schedule_time'] ?? null);
        $arabicSlug  = $this->makeArabicSlug($validated['ar_title'] ?? null);
        $englishSlug = Str::slug((string) ($validated['en_title'] ?? ''));

        $mainImageName = $article->main_image;
        if ($request->hasFile('main_image')) {
            $newName = $this->saveWebp($request->file('main_image'), self::MAIN_DIR);
            if ($newName) {
                $this->deleteIfExists(public_path(self::MAIN_DIR . '/' . $mainImageName));
                $mainImageName = $newName;
            }
        }

        if ($request->filled('deleted_images') && is_array($request->deleted_images)) {
            $toDelete = \App\NewArticleImage::whereIn('id', $request->deleted_images)
                ->where('new_article_id', $article->id)
                ->get();

            foreach ($toDelete as $img) {
                // امسح الملف من الديسك
                $this->deleteIfExists(public_path(trim(self::GALLERY_DIR, '/') . '/' . $img->image));
                if (!empty($img->image_url)) {
                    $this->deleteIfExists(public_path(ltrim($img->image_url, '/')));
                }
                // امسح السجل
                $img->delete();
            }
        }

        $payload = array_merge($validated, [
            'en_slug'        => $englishSlug,
            'ar_slug'        => $arabicSlug,
            'main_image'     => $mainImageName,
            'schedule_date'  => $schedule,
        ]);

        $article->update($payload);

        if ($request->hasFile('arrayOfImages')) {
            $this->saveGallery($request->file('arrayOfImages'), $article->id);
        }

        Session::flash('flash_message', 'Blog updated successfully!');
        return $request->hasFile('arrayOfImages')
            ? redirect()->route('newArticle.edit', $article->id)
            : redirect()->route('newArticle.index');
    }


    /* ===================== Helpers (Clean) ===================== */

    private function webpName(): string
    {
        return now()->timestamp . '_' . Str::random(10) . '.webp';
    }

    private function saveWebp(UploadedFile $file, string $dir): ?string
    {
        try {
            $name = $this->webpName();
            $path = public_path(trim($dir, '/') . '/' . $name);
            if (!is_dir(dirname($path))) {
                mkdir(dirname($path), 0777, true);
            }
            Image::read($file)
                ->toWebp(self::WEBP_QUALITY)
                ->save($path);
            return $name;
        } catch (\Throwable $e) {
            return null;
        }
    }
    private function saveGallery(array $files, int $articleId): void
    {
        foreach ($files as $img) {
            if (!$img instanceof UploadedFile) continue;

            $name = $this->saveWebp($img, self::GALLERY_DIR);
            if (!$name) continue;

            NewArticleImage::create([
                'image'          => $name,
                'new_article_id' => $articleId,
                'image_url'      => self::GALLERY_DIR . '/' . $name,
            ]);
        }
    }

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

    private function deleteIfExists(string $absolutePath): void
    {
        if (is_file($absolutePath)) @unlink($absolutePath);
    }

    private function validateStore(Request $request): array
    {
        $subTable = (new NewArticleSubCatrgory)->getTable();

        $rules = [
            'ar_title'  => 'required|string|max:255',
            'en_title'  => 'nullable|string|max:255',

            'ar_text'   => 'required|string',
            'en_text'   => 'nullable|string',

            'ar_tag_title' => 'required|string|max:255',
            'en_tag_title' => 'nullable|string|max:255',

            'ar_tag_desc'  => 'required|string|max:1000',
            'en_tag_desc'  => 'nullable|string|max:1000',

            'blog_script'        => 'nullable|string',
            'blog_second_script' => 'nullable|string',

            'schedule_date' => 'nullable|date|after_or_equal:today',
            'schedule_time' => 'nullable|date_format:H:i',

            'new_article_sub_catrgory_id' => "required|integer|exists:{$subTable},id",

            'status' => 'required|in:0,1',

            'main_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:4096',

            'arrayOfImages'   => 'nullable|array|max:20',
            'arrayOfImages.*' => 'image|mimes:jpeg,jpg,png,webp|max:6144',
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
            'ar_title'  => 'required|string|max:255',
            'en_title'  => 'nullable|string|max:255',

            'ar_text'   => 'required|string',
            'en_text'   => 'nullable|string',

            'ar_tag_title' => 'required|string|max:255',
            'en_tag_title' => 'nullable|string|max:255',

            'ar_tag_desc'  => 'required|string|max:1000',
            'en_tag_desc'  => 'nullable|string|max:1000',

            'blog_script'        => 'nullable|string',
            'blog_second_script' => 'nullable|string',

            'schedule_date' => 'nullable|date|after_or_equal:today',
            'schedule_time' => 'nullable|date_format:H:i',

            'new_article_sub_catrgory_id' => "required|integer|exists:{$subTable},id",

            'status' => 'required|in:0,1',

            'main_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',

            'arrayOfImages'   => 'nullable|array|max:20',
            'arrayOfImages.*' => 'image|mimes:jpeg,jpg,png,webp|max:6144',
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
            'en_title'  => 'English title',
            'ar_text'   => 'Arabic text',
            'en_text'   => 'English text',
            'ar_tag_title' => 'Arabic tag title',
            'en_tag_title' => 'English tag title',
            'ar_tag_desc'  => 'Arabic tag description',
            'en_tag_desc'  => 'English tag description',
            'blog_script'  => 'Article script',
            'blog_second_script' => 'Article second script',
            'schedule_date' => 'publish date',
            'schedule_time' => 'publish time',
            'new_article_sub_catrgory_id' => 'sub category',
            'status' => 'status',
            'main_image' => 'main image',
            'arrayOfImages' => 'gallery images',
            'arrayOfImages.*' => 'gallery image',
        ];
    }
}
