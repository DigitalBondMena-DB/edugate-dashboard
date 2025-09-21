<?php

namespace App\Http\Controllers\BackEnd;
use App\EventCategery;
use App\EventGallary;
use App\EventDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreEventDetailRequest;
use App\Http\Requests\Backend\UpdateEventDetailRequest;

class EventDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = EventDetail::latest()->paginate(10);

        return view('backend.event_detail.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventCategoeries = EventCategery::get();

        return view('backend.event_detail.create', compact('eventCategoeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventDetailRequest $request)
    {
        $requestArray = $request->all();
        
        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('eventDetail'), $fileName);
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('eventDetail'), $fileName1);
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
        
        $eventDetail = EventDetail::create($requestArray);
        
        $eventCategery = EventCategery::where('id' , $eventDetail->event_category_id)->get();

        

        Session::flash('flash_message', 'EventDetail added successfully!');
        return redirect()->route('event-detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventDetail = EventDetail::findorFail($id);

        return view('backend.event_detail.show', compact('eventDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = EventDetail::findorFail($id);
        $eventCategeries  = EventCategery::get();
        
        return view('backend.event_detail.edit', compact('row', 'eventCategeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventDetailRequest $request, $id)
    {
        $requestArray = $request->all();

        $eventDetail = EventDetail::findorFail($id);

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('eventDetail'), $fileName);

            if($eventDetail->featured_image !== NULL) {
                if (file_exists(public_path('eventDetail/'. $eventDetail->featured_image))) {
                    unlink(public_path('eventDetail/'. $eventDetail->featured_image));
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('eventDetail'), $fileName1);

            if($eventDetail->banner_image !== NULL) {
                if (file_exists(public_path('eventDetail/'. $eventDetail->banner_image))) {
                    unlink(public_path('eventDetail/'. $eventDetail->banner_image));
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
            'featured_image' => $request->hasFile('featured_image') ? $fileName : $eventDetail->featured_image , 
            'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $eventDetail->banner_image] 
            + $request->all();

        $eventDetail->update($requestArray);

        Session::flash('flash_message', 'Event Details updated successfully!');
        return redirect()->route('event-detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventDetail = EventDetail::findorFail($id);

        $eventGallery = EventGallary::where('event_detail_id' , $id);
        
        $eventGallery->delete();
        $eventDetail->delete();

        Session::flash('flash_message', 'EventDetail deleted successfully!');
        return redirect()->route('event-detail.index');
    }
}

