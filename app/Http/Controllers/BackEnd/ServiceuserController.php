<?php

namespace App\Http\Controllers\BackEnd;

use App\Serviceuser;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreServiceusersRequest;
use App\Http\Requests\Backend\UpdateServiceusersRequest;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Laravel\Facades\Image;

class ServiceuserController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Serviceuser::select('id', 'en_name', 'ar_name', 'image', 'active')->latest()->paginate(10);

        return view('dashboard.serviceuser.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.serviceuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceusersRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.'webp';
            if(!file_exists(public_path('serviceuser'))){
                mkdir(public_path('serviceuser'), 0755, true);
            }
            $img = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save(public_path('serviceuser/' . $fileName));
            $data['image'] = $fileName;

            $row = Serviceuser::create($data);
            Session::flash('flash_message', 'Service added successfully');
            return redirect()->route('serviceuser.index');
        } else {
            Session::flash('flash_message', 'Error adding service');
            return redirect()->route('serviceuser.index');
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
        $row = Serviceuser::select('id', 'en_name', 'ar_name', 'ar_first_text', 'en_first_text', 'image')->findorFail($id);

        return view('dashboard.serviceuser.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceusersRequest $request, $id)
    {
        $service = Serviceuser::findorFail($id);
        // dd($service);
        $data = $request->validated();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.webp';
            if(!file_exists(public_path('serviceuser'))){
                mkdir(public_path('serviceuser'), 0755, true);
            }
            $img = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save(public_path('serviceuser/' . $fileName));
            if($service->image !== NULL) {
                if(file_exists(public_path('serviceuser/'. $service->image))) {
                    unlink(public_path('serviceuser/'. $service->image));
                }
            }
            $data['image'] = $fileName;
        }

        try {
        $result = $service->update($data);
        if($result) {
            Session::flash('flash_message', 'Service updated successfully');
            return redirect()->route('serviceuser.index');
        } else {
            // Log the failure without calling update again
            Log::error('Service update failed', ['data' => $data, 'service_id' => $service->id]);
            Session::flash('flash_error', 'Failed to update service');
            return redirect()->back()->withInput();
        }
    } catch (\Exception $e) {
        Log::error('Exception during service update: ' . $e->getMessage(), [
            'data' => $data, 
            'service_id' => $service->id,
            'exception' => $e
        ]);
    }

        Session::flash('flash_error', 'Failed to update service');
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $service = Serviceuser::findorFail($id);

    //     if($service->image !== NULL) {
    //         if(file_exists(public_path('serviceuser/'. $service->image))) {
    //             unlink(public_path('serviceuser/'. $service->image));
    //         }
    //     }

    //     $service->delete();

    //     Session::flash('flash_message', 'Service Users deleted successfully');
    //     return redirect()->route('serviceuser.index');
    // }

    public function toggleStatus(Serviceuser $serviceuser) {
        $serviceuser->active = $serviceuser->active === 'activated' ? 'deactivated' : 'activated';
        $serviceuser->save();
        Session::flash('flash_message', "Service {$serviceuser->active} successfully.");
        return redirect()->route('serviceuser.index');
    }
}
