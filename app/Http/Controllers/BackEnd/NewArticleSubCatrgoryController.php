<?php

namespace App\Http\Controllers\BackEnd;

use App\NewArticleSubCatrgory;
use App\NewArticleCatrgory;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    $query = NewArticleSubCatrgory::select('id', 'en_title', 'ar_title', 'active', 'new_article_catrgory_id');
    
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
        $data = $request->validated();

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
