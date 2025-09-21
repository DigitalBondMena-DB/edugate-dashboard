<?php

namespace App\Http\Controllers\BackEnd;

use App\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreDestinationRequest;
use App\Http\Requests\Backend\UpdateDestinationRequest;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Destination::latest()->paginate(10);

        return view('backend.destinations.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDestinationRequest $request)
    {        
        $requestArray = $request->all();

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('destinations'), $fileName);
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('destinations'), $fileName1);
        }

        if($request->hasFile('flag')) {
            $file2 = $request->file('flag');
            $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('destinations'), $fileName2);
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

        $ar_slug = make_slug($request->ar_name);


        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug, 'featured_image' => $fileName, 'banner_image' => $fileName1, 'flag' => $fileName2] + $request->all();

        $row = Destination::create($requestArray);

        Session::flash('flash_message', 'Destination added successfully!');
        return redirect()->route('destinations.index');
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
        $row = Destination::findorFail($id);

        return view('backend.destinations.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDestinationRequest $request, $id)
    {
        $destination = Destination::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('destinations'), $fileName);

            if($destination->featured_image !== NULL) {
                if(file_exists(public_path('destinations/'. $destination->featured_image))) {
                    unlink(public_path('destinations/'. $destination->featured_image));
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('destinations'), $fileName1);

            if($destination->banner_image !== NULL) {
                if(file_exists(public_path('destinations/'. $destination->banner_image))) {
                    unlink(public_path('destinations/'. $destination->banner_image));
                }
            }
        }

        if($request->hasFile('flag')) {
            $file2 = $request->file('flag');
            $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('destinations'), $fileName2);

            if($destination->flag !== NULL) {
                if(file_exists(public_path('destinations/'. $destination->flag))) {
                    unlink(public_path('destinations/'. $destination->flag));
                }
            }
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

        $ar_slug = make_slug($request->ar_name);

        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug, 
            'featured_image' => $request->hasFile('featured_image') ? $fileName : $destination->featured_image, 
            'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $destination->banner_image,
            'flag' => $request->hasFile('flag') ? $fileName2 : $destination->flag
        ] + $request->all();

        $destination->update($requestArray);

        Session::flash('flash_message', 'Destination updated successfully!');
        return redirect()->route('destinations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = Destination::findorFail($id);

        if($destination->featured_image !== NULL) {
            if(file_exists(public_path('destinations/'. $destination->featured_image))) {
                unlink(public_path('destinations/'. $destination->featured_image));
            }
        }

        if($destination->banner_image !== NULL) {
            if(file_exists(public_path('destinations/'. $destination->banner_image))) {
                unlink(public_path('destinations/'. $destination->banner_image));
            }
        }

        if($destination->flag !== NULL) {
            if(file_exists(public_path('destinations/'. $destination->flag))) {
                unlink(public_path('destinations/'. $destination->flag));
            }
        }

        $destination->delete();

        Session::flash('flash_message', 'Destination deleted successfully!');
        return redirect()->route('destinations.index');
    }
}
