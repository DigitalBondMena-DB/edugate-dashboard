<?php

namespace App\Http\Controllers\BackEnd;

use App\NewArticleCatrgory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\NewArticleSubCatrgory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Backend\StoreNewArticleSubCatrgoryRequest;
use App\Http\Requests\Backend\UpdateNewArticleSubCatrgoryRequest;

class NewArticleSubCatrgoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewArticleCatrgory::select('ar_title', 'en_title', 'id')->get();
        return view('dashboard.articleSubCategory.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewArticleSubCatrgoryRequest $request)
    {
        // dd($request->hasFile('banner_image'));
        $data = $request->validated();
        if($request->hasFile('banner_image')) {
            $imageName = time() . Str::random(10) . '.' . 'webp';
            if (!file_exists(public_path('subcategory'))) {
                mkdir(public_path('subcategory'), 0755, true);
            }
            $imagePath = public_path('subcategory/' . $imageName);
            $image = Image::read($request->file('banner_image')->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            $data['banner_image'] = $imageName;
        }

        function make_slug($string, $separator = '-') {
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
        $row = NewArticleSubCatrgory::findorFail($id);

        $categories = NewArticleCatrgory::get();

        return view('dashboard.articleSubCategory.edit', compact('row' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewArticleSubCatrgoryRequest $request, NewArticleSubCatrgory $articleSubCategory)
    {

        $data = $request->validated();

        if($request->hasFile('banner_image')) {
            $imageName = time() . Str::random(10) . '.' . 'webp';
            if (!file_exists(public_path('subcategory'))) {
                mkdir(public_path('subcategory'), 0755, true);
            }
            $imagePath = public_path('subcategory/' . $imageName);
            $image = Image::read($request->file('banner_image')->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            if($articleSubCategory->banner_image) {
                unlink(public_path('subcategory/'.$articleSubCategory->banner_image));
            }
            $data['banner_image'] = $imageName;
        }

        $articleSubCategory->update($data);

        Session::flash('flash_message', 'Article Sub Category updated successfully');
        return redirect()->route('articleSubCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $newArticle = NewArticleSubCatrgory::findorFail($id);

        
    //     $newArticle->delete();

    //     Session::flash('flash_message', 'Article Sub Category deleted successfully');
    //     return redirect()->route('articleSubCategory.index');
    // }

    public function toggleStatus(NewArticleSubCatrgory $articleSubCategory)
    {
        $articleSubCategory->active = $articleSubCategory->active === 'activated' ? 'deactivated' : 'activated';
        $articleSubCategory->save();
        Session::flash('flash_message', "Article Sub Category {$articleSubCategory->active} successfully.");
        return redirect()->route('articleSubCategory.index');
    }
}
