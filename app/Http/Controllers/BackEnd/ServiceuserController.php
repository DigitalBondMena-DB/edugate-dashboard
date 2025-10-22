<?php

namespace App\Http\Controllers\BackEnd;

use App\Serviceuser;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreServiceusersRequest;
use App\Http\Requests\Backend\UpdateServiceusersRequest;

class ServiceuserController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $rows = Serviceuser::select('id', 'en_name', 'ar_name', 'image', 'active')->latest()->paginate(10);
        return view('dashboard.serviceuser.index', compact('rows'));
    }

    public function create()
    {
        return view('dashboard.serviceuser.create');
    }

    public function store(StoreServiceusersRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'serviceuser', null);
        }

        Serviceuser::create($data);
        Session::flash('flash_message', 'Service added successfully');
        return redirect()->route('serviceuser.index');
    }

    public function edit($id)
    {
        $row = Serviceuser::select('id', 'en_name', 'ar_name', 'ar_first_text', 'en_first_text', 'image')->findorFail($id);

        return view('dashboard.serviceuser.edit', compact('row'));
    }

    public function update(UpdateServiceusersRequest $request, $id)
    {
        $service = Serviceuser::findorFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'serviceuser', $service->image ?? null);
        }
        $service->update($data);
        Session::flash('flash_message', 'Service updated successfully');
        return redirect()->route('serviceuser.index');
    }

    public function toggleStatus(Serviceuser $serviceuser)
    {
        $serviceuser->active = $serviceuser->active === 'activated' ? 'deactivated' : 'activated';
        $serviceuser->save();
        Session::flash('flash_message', "Service {$serviceuser->active} successfully.");
        return redirect()->route('serviceuser.index');
    }
}
