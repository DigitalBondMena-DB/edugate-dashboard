<?php

namespace App\Http\Controllers\BackEnd;

use App\Service;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreServicesRequest;
use App\Http\Requests\Backend\UpdateServicesRequest;
use Intervention\Image\Laravel\Facades\Image;

class ServicesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Service::select('id', 'en_name', 'ar_name', 'image', 'active')->latest()->paginate(10);

        return view('dashboard.services.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicesRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.'webp';
            if(!file_exists(public_path('service'))) {
                mkdir(public_path('service'), 0755, true);
            }
            $imagePath = public_path('service/' . $fileName);
            $image = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            $data['image'] = $fileName;

            Service::create($data);

            Session::flash('flash_message', 'Feedback added successfully');
            return redirect()->route('service.index');
        } else {
            Session::flash('flash_message', 'Error adding feedback');
            return redirect()->route('service.index');
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
        $row = Service::findorFail($id);

        return view('dashboard.services.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServicesRequest $request, Service $service)
    {
        $data = $request->validated();


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            if(!file_exists(public_path('service'))) {
                mkdir(public_path('service'), 0755, true);
            }
            $file->move(public_path('service'), $fileName);

            if($service->image !== NULL) {
                if(file_exists(public_path('service/'. $service->image))) {
                    unlink(public_path('service/'. $service->image));
                }
            }
            $data['image'] = $fileName;
        }

        $service->update($data);

        Session::flash('flash_message', 'Feedback updated successfully');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $service = Service::findorFail($id);

    //     if($service->image !== NULL) {
    //         if(file_exists(public_path('service/'. $service->image))) {
    //             unlink(public_path('service/'. $service->image));
    //         }
    //     }

    //     $service->delete();

    //     Session::flash('flash_message', 'Feedback deleted successfully');
    //     return redirect()->route('Service.index');
    // }
    public function toggleStatus(Service $service)
    {
        $service->active = $service->active === 'activated' ? 'deactivated' : 'activated';
        $service->save();
        Session::flash('flash_message', "Feedback {$service->active} successfully.");
        return redirect()->route('service.index');
    }
}
