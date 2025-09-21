<?php

namespace App\Http\Controllers\BackEnd;

use App\Serviceuser;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreServiceusersRequest;
use App\Http\Requests\Backend\UpdateServiceusersRequest;

class ServiceuserController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Serviceuser::latest()->paginate(10);

        return view('backend.serviceuser.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.serviceuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceusersRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('serviceuser'), $fileName);
        }

        $requestArray = ['image' => $fileName] + $request->all();

        $row = Serviceuser::create($requestArray);

        Session::flash('flash_message', 'Service added successfully');
        return redirect()->route('serviceuser.index');
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
        $row = Serviceuser::findorFail($id);

        return view('backend.serviceuser.edit', compact('row'));
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

        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('serviceuser'), $fileName);

            if($service->image !== NULL) {
                if(file_exists(public_path('serviceuser/'. $service->image))) {
                    unlink(public_path('serviceuser/'. $service->image));
                }
            }
        }
        $requestArray = ['image' => $request->hasFile('image') ? $fileName: $service->image] + $request->all();

        $service->update($requestArray);

        Session::flash('flash_message', 'service updated successfully');
        return redirect()->route('serviceuser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Serviceuser::findorFail($id);

        if($service->image !== NULL) {
            if(file_exists(public_path('serviceuser/'. $service->image))) {
                unlink(public_path('serviceuser/'. $service->image));
            }
        }

        $service->delete();

        Session::flash('flash_message', 'Service Users deleted successfully');
        return redirect()->route('serviceuser.index');
    }
}
