<?php

namespace App\Http\Controllers\BackEnd;

use App\ServiceAboutSection;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreServiceAboutSectionRequest;
use App\Http\Requests\Backend\UpdateServiceAboutSectionRequest;

class ServiceAboutSectionController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = ServiceAboutSection::latest()->paginate(10);

        return view('backend.serviceAboutSection.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.serviceAboutSection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceAboutSectionRequest $request)
    {
        $requestArray = $request->all();


        $row = ServiceAboutSection::create($requestArray);

        Session::flash('flash_message', 'Service added successfully');
        return redirect()->route('serviceAboutSection.index');
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
        $row = ServiceAboutSection::findorFail($id);

        return view('backend.serviceAboutSection.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceAboutSectionRequest $request, $id)
    {
        $service = ServiceAboutSection::findorFail($id);

        $requestArray = $request->all();

        

        $service->update($requestArray);

        Session::flash('flash_message', 'service updated successfully');
        return redirect()->route('serviceAboutSection.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ServiceAboutSection::findorFail($id);

        

        $service->delete();

        Session::flash('flash_message', 'Service Users deleted successfully');
        return redirect()->route('serviceAboutSection.index');
    }
}
