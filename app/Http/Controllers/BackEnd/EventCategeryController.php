<?php

namespace App\Http\Controllers\BackEnd;

use App\EventCategery;
use App\EventDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Backend\StoreEventCategeryRequest;
use App\Http\Requests\Backend\UpdateEventCategeryRequest;

class EventCategeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = EventCategery::latest()->paginate(10);

        return view('backend.event_categery.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event_categery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventCategeryRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('eventCategery'), $fileName);
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('eventCategery'), $fileName1);
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

        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug,'featured_image' => $fileName , 'banner_image' => $fileName1  ] + $request->all();

        $row = EventCategery::create($requestArray);

        Session::flash('flash_message', 'EventCategery added successfully!');
        return redirect()->route('event-categery.index');
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
        $row = EventCategery::findorFail($id);

        return view('backend.event_categery.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventCategeryRequest $request, $id)
    {
        $eventCategery = EventCategery::findorFail($id);

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('eventCategery'), $fileName);

            if($eventCategery->featured_image !== NULL) {
                if (file_exists(public_path('eventCategery/'. $eventCategery->featured_image))) {
                    unlink(public_path('eventCategery/'. $eventCategery->featured_image));
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('eventCategery'), $fileName1);

            if($eventCategery->banner_image !== NULL) {
                if (file_exists(public_path('eventCategery/'. $eventCategery->banner_image))) {
                    unlink(public_path('eventCategery/'. $eventCategery->banner_image));
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

        $requestArray = [
            'en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug,
            'featured_image' => $request->hasFile('featured_image') ? $fileName : $eventCategery->featured_image , 
            'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $eventCategery->banner_image] 
            + $request->all();

        $eventCategery->update($requestArray);

        Session::flash('flash_message', 'EventCategery updated successfully!');
        return redirect()->route('event-categery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventCategery = EventCategery::findorFail($id);


        $eventDetails = EventDetail::where('event_category_id' , $id);
        
        $eventDetails->delete();

        $eventCategery->delete();

        Session::flash('flash_message', 'EventCategery deleted successfully!');
        return redirect()->route('event-categery.index');
    }
}
