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
        $rows = NewArticleCatrgory::latest()->paginate(10);

        return view('backend.articleCategory.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.articleCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewArticleCatrgoryRequest $request)
    {
        $requestArray = $request->all();

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
        
        $ar_slug = make_slug($request->ar_title);
        
        $requestArray = ['en_slug' => Str::slug($request->en_title), 'ar_slug' => $ar_slug ] + $request->all();
        

        $row = NewArticleCatrgory::create($requestArray);

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
        $row = NewArticleCatrgory::findorFail($id);

        return view('backend.articleCategory.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewArticleCatrgoryRequest $request, $id)
    {
        $newArticle = NewArticleCatrgory::findorFail($id);

        $requestArray = $request->all();

        $newArticle->update($requestArray);

        Session::flash('flash_message', 'Article Category updated successfully');
        return redirect()->route('articleCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newArticle = NewArticleCatrgory::findorFail($id);

        
        $newArticle->delete();

        Session::flash('flash_message', 'Article Category deleted successfully');
        return redirect()->route('articleCategory.index');
    }
}
