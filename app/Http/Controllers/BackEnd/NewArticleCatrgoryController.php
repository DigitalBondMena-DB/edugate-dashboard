<?php

namespace App\Http\Controllers\BackEnd;

use App\NewArticleCatrgory;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreNewArticleCatrgoryRequest;
use App\Http\Requests\Backend\UpdateNewArticleCatrgoryRequest;

class NewArticleCatrgoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = NewArticleCatrgory::select('id', 'en_title', 'ar_title', 'active')->latest()->paginate(10);

        return view('dashboard.articleCategory.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articleCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewArticleCatrgoryRequest $request)
    {
        $data = $request->validated();

        function make_slug($string, $separator = '-') {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

            // Remove multiple dashes or whitespaces or underscores
            $string = preg_replace("/[\s\-]+/", " ", $string);

            // Convert whitespaces and to the given separator
            $string = preg_replace("/[\s_]/", $separator, $string);

            return $string;
        }
        
        $data['ar_slug'] = make_slug($request->ar_title);
        $data['en_slug'] = Str::slug($request->en_title);
        $row = NewArticleCatrgory::create($data);

        Session::flash('flash_message', 'Article Category added successfully');
        
        return redirect()->route('articleCategory.index');
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
    $row = NewArticleCatrgory::select('id', 'en_title', 'ar_title')->findorFail($id);

        return view('dashboard.articleCategory.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewArticleCatrgoryRequest $request, NewArticleCatrgory $articleCategory)
    {
        // dd($articleCategory);
        $data = $request->validated();

        $articleCategory->update($data);

        Session::flash('flash_message', 'Article Category updated successfully');
        return redirect()->route('articleCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $newArticle = NewArticleCatrgory::findorFail($id);

        
    //     $newArticle->delete();

    //     Session::flash('flash_message', 'Article Category deleted successfully');
    //     return redirect()->route('articleCategory.index');
    // }
    public function toggleStatus(NewArticleCatrgory $articleCategory)
    {
        $articleCategory->active = $articleCategory->active === 'activated' ? 'deactivated' : 'activated';
        $articleCategory->save();
        Session::flash('flash_message', "Article Category {$articleCategory->active} successfully.");
        return redirect()->route('articleCategory.index');
    }
}
