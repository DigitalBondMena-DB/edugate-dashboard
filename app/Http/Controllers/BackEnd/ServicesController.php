<?php

namespace App\Http\Controllers\BackEnd;

use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreServicesRequest;
use App\Http\Requests\Backend\UpdateServicesRequest;
use App\Services\ImageService;

class ServicesController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $rows = Service::select('id', 'en_name', 'ar_name', 'image', 'active')->latest()->paginate(10);
        return view('dashboard.services.index', compact('rows'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(StoreServicesRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'service', null);
        }

        Service::create($data);
        Session::flash('flash_message', 'Feedback added successfully');
        return redirect()->route('service.index');
    }

    public function edit($id)
    {
        $row = Service::findorFail($id);

        return view('dashboard.services.edit', compact('row'));
    }

    public function update(UpdateServicesRequest $request, Service $service)
    {
        $data = $request->validated();


        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'service', $service->image ?? null);
        }
        $service->update($data);
        Session::flash('flash_message', 'Feedback updated successfully');
        return redirect()->route('service.index');
    }
    public function toggleStatus(Service $service)
    {
        $service->active = $service->active === 'activated' ? 'deactivated' : 'activated';
        $service->save();
        Session::flash('flash_message', "Feedback {$service->active} successfully.");
        return redirect()->route('service.index');
    }
}
