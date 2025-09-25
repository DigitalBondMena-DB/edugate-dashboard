<?php

namespace App\Http\Controllers\BackEnd;

use App\EventCategery;
use App\EventDetail;
use App\EventGallary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Requests\Backend\StoreOrUpdateEventCategeryRequest;


class EventCategeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = EventCategery::select('id', 'en_name', 'ar_name', 'active')->latest()->paginate(10);
        return view('dashboard.event_categery.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.event_categery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrUpdateEventCategeryRequest $request)
    {
        $data = $request->validated();
        EventCategery::create($data);
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imageName = time() . Str::random(10) . '.' . 'webp';
                if (!file_exists(public_path('event_categery'))) {
                    mkdir(public_path('event_categery'), 0755, true);
                }
                $imagePath = public_path('event_categery/' . $imageName);
                $image = Image::read($image->getRealPath())
                    ->toWebp(80)
                    ->save($imagePath);
                EventGallary::create([
                    'event_categery_id' => EventCategery::latest()->first()->id,
                    'image' => $imageName
                ]);
            }
        }
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
        $row = EventCategery::select('id', 'en_name', 'ar_name', 'ar_description', 'en_description')
            ->with(['gallaries:id,event_categery_id,image'])
            ->findorFail($id);
        return view('dashboard.event_categery.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrUpdateEventCategeryRequest $request, EventCategery $eventCategery)
    {
        // dd($eventCategery->id);
        $data = $request->validated();
        $deleted_images = $request->input('deleted_images');
        $eventCategery->update($data);
        if (!empty($deleted_images)) {
            $toDelete = EventGallary::where('event_categery_id', $eventCategery->id)->whereIn('id', $deleted_images)->get();
            // dd($toDelete);
            foreach ($toDelete as $image) {
                if (file_exists(public_path('event_categery/' . $image->image))) {
                    unlink(public_path('event_categery/' . $image->image));
                }
                $image->delete();
            }
        }
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $imageName = time() . Str::random(10) . '.' . 'webp';
                if (!file_exists(public_path('event_categery'))) {
                    mkdir(public_path('event_categery'), 0755, true);
                }
                $imagePath = public_path('event_categery/' . $imageName);
                $image = Image::read($file->getRealPath())
                    ->toWebp(80)
                    ->save($imagePath);
                $data = EventGallary::create([
                    'event_categery_id' => $eventCategery->id,
                    'image' => $imageName
                ]);
                // dd($data);
            }
        }

        Session::flash('flash_message', 'Event category & gallery updated successfully!');
        return redirect()->route('event-categery.index');
    }


    public function toggleStatus(EventCategery $eventCategery)
    {
        $eventCategery->active = $eventCategery->active === 'activated' ? 'deactivated' : 'activated';
        $eventCategery->save();
        Session::flash('flash_message', "EventCategery {$eventCategery->active} successfully.");
        return redirect()->route('event-categery.index');
    }
}
