<?php

namespace App\Http\Controllers\BackEnd;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Gallery::latest()->paginate(10);

        return view('backend.gallery.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('gallery'), $fileName);
        }

        Gallery::create([
            'image' => isset($fileName) ? $fileName : NULL
        ]);

        Session::flash('flash_message', 'Gallery created successfully!');
        return redirect()->route('gallery.index');
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
        $row = Gallery::findorFail($id);

        return view('backend.gallery.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $gallery = Gallery::findorFail($id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('gallery'), $fileName);

            if($gallery->image !== NULL) {
                if (file_exists(public_path('gallery/'. $gallery->image))) {
                    unlink(public_path('gallery/'. $gallery->image));
                }
            }
        }

        $gallery->update([
            'image' => isset($fileName) ? $fileName : $gallery->image
        ]);

        Session::flash('flash_message', 'Gallery updated successfully!');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findorFail($id);

        if($gallery->image !== NULL) {
            if(file_exists(public_path('gallery/'. $gallery->image))) {
                unlink(public_path('gallery/'. $gallery->image));
            }
        }

        $gallery->delete();

        Session::flash('flash_message', 'Gallery deleted successfully!');
        return redirect()->route('gallery.index');
    }
}
