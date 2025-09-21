<?php

namespace App\Http\Controllers\BackEnd;
use App\EventDetail;
use App\EventGallary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class EventGallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $eventDetail = EventDetail::findorFail($id);

        return view('backend.event_gallary.create', compact('eventDetail'));
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
            'image' => 'required|mimes:jpg,jpeg,png,svg',
        ]);

        $eventDetail = EventDetail::findorFail($request->event_detail_id);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('eventGallary'), $fileName);
        }
       
        EventGallary::create([
            'image' => isset($fileName) ? $fileName : NULL,
            'event_detail_id' => $request->event_detail_id
        ]);  


        Session::flash('flash_message', 'image added successfully!');
        return redirect()->route('event-gallary.show', $eventDetail->id);
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

        $rows = $eventDetail->event_gallary()->paginate(10);

        return view('backend.event_gallary.index', compact('rows', 'eventDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = EventGallary::findorFail($id);

        return view('backend.event_gallary.edit', compact('row'));
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
            'image' => 'mimes:jpg,jpeg,png,svg',
        ]);

        $row = EventGallary::findorFail($id);

        $eventDetail = EventDetail::findorFail($row->event_detail_id);

        
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('eventGallary'), $fileName);

            if($row->image !== NULL) {
                if (file_exists(public_path('eventGallary/'. $row->image))) {
                    unlink(public_path('eventGallary/'. $row->image));
                }
            }
        }

        $row->update([
            'image' => isset($fileName) ? $fileName : $row->image,
        ]);    

        Session::flash('flash_message', 'image  updated successfully!');
        return redirect()->route('event-gallary.show', $eventDetail->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = EventGallary::findorFail($id);

        $eventDetail = EventDetail::findorFail($row->event_detail_id);

        $row->delete();

        Session::flash('flash_message', 'Day deleted successfully!');
        return redirect()->route('event-gallary.show', $eventDetail->id);
    }
}

