<?php

namespace App\Http\Controllers\BackEnd;

use App\NewArticleCatrgory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\NewArticleSubCatrgory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreNewArticleSubCatrgoryRequest;
use App\Http\Requests\Backend\UpdateNewArticleSubCatrgoryRequest;
use App\Services\ImageService;

class NewArticleSubCatrgoryController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index(Request $request)
    {
        $query = NewArticleSubCatrgory::select('id', 'en_title', 'ar_title', 'active', 'new_article_catrgory_id', 'banner_image');

        if ($request->has('category_id') && $request->category_id != '0') {
            $query->where('new_article_catrgory_id', $request->category_id);
        }
        $rows = $query->latest()->paginate(10);
        $categories = NewArticleCatrgory::select('ar_title', 'en_title', 'id')->get();

        return view('dashboard.articleSubCategory.index', compact('rows', 'categories', 'request'));
    }

    public function create()
    {
        $categories = NewArticleCatrgory::select('ar_title', 'en_title', 'id')->get();
        return view('dashboard.articleSubCategory.create', compact('categories'));
    }

    public function store(StoreNewArticleSubCatrgoryRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $this->imageService->handle($request->file('banner_image'), 'subcategory');
        }
        function make_slug($string, $separator = '-')
        {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

            // Remove multiple dashes or whitespaces or underscores
            $string = preg_replace("/[\s\-]+/", " ", $string);

            // Convert whitespaces and underscore to the given separator
            $string = preg_replace("/[\s_]/", $separator, $string);

            return $string;
        }

        $data['ar_slug'] = make_slug($request->ar_title);
        $data['en_slug'] = Str::slug($request->en_title);
        $row = NewArticleSubCatrgory::create($data);

        Session::flash('flash_message', 'Article Sub Category added successfully');
        return redirect()->route('articleSubCategory.index');
    }

    public function edit($id)
    {
        $row = NewArticleSubCatrgory::findorFail($id);

        $categories = NewArticleCatrgory::get();

        return view('dashboard.articleSubCategory.edit', compact('row', 'categories'));
    }

    public function update(UpdateNewArticleSubCatrgoryRequest $request, NewArticleSubCatrgory $articleSubCategory)
    {

        $data = $request->validated();

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $this->imageService->handle($request->file('banner_image'), 'subcategory', $articleSubCategory->banner_image);
        }

        $articleSubCategory->update($data);
        Session::flash('flash_message', 'Article Sub Category updated successfully');
        return redirect()->route('articleSubCategory.index');
    }

    public function toggleStatus(NewArticleSubCatrgory $articleSubCategory)
    {
        $articleSubCategory->active = $articleSubCategory->active === 'activated' ? 'deactivated' : 'activated';
        $articleSubCategory->save();
        Session::flash('flash_message', "Article Sub Category {$articleSubCategory->active} successfully.");
        return redirect()->route('articleSubCategory.index');
    }
}
