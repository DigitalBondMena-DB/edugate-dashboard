<?php

namespace App\Http\Controllers\BackEnd;

use App\NewArticleImage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreNewArticleRequest;
use App\Http\Requests\Backend\UpdateNewArticleRequest;

class NewArticleImageController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = NewArticleImage::latest()->paginate(10);

        return view('backend.articleImage.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.articleImage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewArticleRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('articleImage'), $fileName);
        }

        $requestArray = ['image' => $fileName] + $request->all();

        $row = NewArticleImage::create($requestArray);

        Session::flash('flash_message', 'Article Image added successfully');
        return redirect()->route('articleImage.index');
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
        $row = NewArticleImage::findorFail($id);

        return view('backend.articleImage.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewArticleRequest $request, $id)
    {
        $newArticle = NewArticleImage::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('articleImage'), $fileName);

            if($newArticle->image !== NULL) {
                if(file_exists(public_path('articleImage/'. $newArticle->image))) {
                    unlink(public_path('articleImage/'. $newArticle->image));
                }
            }
        }


        $requestArray = ['image' => $request->hasFile('image') ? $fileName: $newArticle->image] + $request->all();

        $newArticle->update($requestArray);

        Session::flash('flash_message', 'Article Image updated successfully');
        return redirect()->route('articleImage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newArticle = NewArticleImage::findorFail($id);

        if($newArticle->image !== NULL) {
            if(file_exists(public_path('articleImage/'. $newArticle->image))) {
                unlink(public_path('articleImage/'. $newArticle->image));
            }
        }

        $newArticle->delete();

        Session::flash('flash_message', 'Article Image deleted successfully');
        return redirect()->route('articleImage.index');
    }
}
