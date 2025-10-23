<?php

namespace App\Http\Controllers\BackEnd;

use App\EventCategery;
use App\EventGallary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreOrUpdateEventCategeryRequest;
use App\Services\ImageService;

class EventCategeryController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $rows = EventCategery::select('id', 'en_name', 'ar_name', 'active', 'ar_description', 'en_description')->latest()->paginate(10);
        return view('dashboard.event_categery.index', compact('rows'));
    }

    public function create()
    {
        return view('dashboard.event_categery.create');
    }
    public function store(StoreOrUpdateEventCategeryRequest $request)
    {
        $data = $request->validated();
        EventCategery::create($data);
        if ($request->hasFile('gallery_images')) {
            $eventCategeryId = EventCategery::latest()->first()->id;
            foreach ($request->file('gallery_images') as $image) {
                $imageName = $this->imageService->handle($image, 'event_categery', null);
                EventGallary::create([
                    'event_categery_id' => $eventCategeryId,
                    'image' => $imageName
                ]);
            }
        }
        Session::flash('flash_message', 'EventCategery added successfully!');
        return redirect()->route('event-categery.index');
    }

    public function edit($id)
    {
        $row = EventCategery::select('id', 'en_name', 'ar_name','en_title', 'ar_title', 'ar_description', 'en_description')
            ->with(['gallaries:id,event_categery_id,image'])
            ->findorFail($id);
        return view('dashboard.event_categery.edit', compact('row'));
    }

    public function update(StoreOrUpdateEventCategeryRequest $request, EventCategery $eventCategery)
    {
        $data = $request->validated();
        $deleted_images = $request->input('deleted_images');
        $eventCategery->update($data);
        if (!empty($deleted_images)) {
            $toDelete = EventGallary::where('event_categery_id', $eventCategery->id)->whereIn('id', $deleted_images)->get();
            foreach ($toDelete as $image) {
                if (file_exists(public_path('event_categery/' . $image->image))) {
                    $oldBase = preg_replace('/_(mobile|tablet|pc)\.webp$/', '', $image->image);
                    $mobilePath = public_path("event_categery/{$oldBase}_mobile.webp");
                    $tabletPath = public_path("event_categery/{$oldBase}_tablet.webp");
                    $pcPath = public_path("event_categery/{$oldBase}_pc.webp");
                    if (file_exists($mobilePath)) {
                        unlink($mobilePath);
                    }
                    if (file_exists($tabletPath)) {
                        unlink($tabletPath);
                    }
                    if (file_exists($pcPath)) {
                        unlink($pcPath);
                    }
                }
                $image->delete();
            }
        }
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imageName = $this->imageService->handle($image, 'event_categery', null);
                $data = EventGallary::create([
                    'event_categery_id' => $eventCategery->id,
                    'image' => $imageName
                ]);
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
