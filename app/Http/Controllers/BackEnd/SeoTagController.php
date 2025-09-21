<?php

namespace App\Http\Controllers\BackEnd;

use App\SeoTag;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreSeoTagRequest;
use App\Http\Requests\Backend\UpdateSeoTagRequest;

class SeoTagController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = SeoTag::latest()->paginate(10);

        return view('backend.tags.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeoTagRequest $request)
    {
        $requestArray = $request->all();
        $tagDAta = SeoTag::where('tag_type' , $request->tag_type)->get()->first();
        if($tagDAta){
            Session::flash('flash_message', 'Tag Page Used before');
        return redirect()->route('tags.index');
        } else {
            
        $row = SeoTag::create($requestArray);
        Session::flash('flash_message', 'Tag added successfully');
        return redirect()->route('tags.index');
        }

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
        $row = SeoTag::findorFail($id);
        // dd($row);

        return view('backend.tags.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeoTagRequest $request, $id)
    {
        // dd(1);
        $tags = SeoTag::findorFail($id);

        $requestArray = $request->all();


        $tags->update($requestArray);

        Session::flash('flash_message', 'Tag updated successfully');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = SeoTag::findorFail($id);

        $tags->delete();

        Session::flash('flash_message', 'Tag deleted successfully');
        return redirect()->route('tags.index');
    }
}
