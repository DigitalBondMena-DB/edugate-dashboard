<?php

namespace App\Http\Controllers\BackEnd;

use App\Activity;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreActivitiesRequest;
use App\Http\Requests\Backend\UpdateActivitiesRequest;

class ActivitiesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Activity::latest()->paginate(10);

        return view('backend.activities.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivitiesRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('activities'), $fileName);
        }

        $requestArray = ['image' => $fileName] + $request->all();

        $row = Activity::create($requestArray);

        Session::flash('flash_message', 'Activity added successfully');
        return redirect()->route('activities.index');
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
        $row = Activity::findorFail($id);

        return view('backend.activities.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivitiesRequest $request, $id)
    {
        $activities = Activity::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('activities'), $fileName);

            if($activities->image !== NULL) {
                if(file_exists(public_path('activities/'. $activities->image))) {
                    unlink(public_path('activities/'. $activities->image));
                }
            }
        }
        $requestArray = ['image' => $request->hasFile('image') ? $fileName: $activities->image] + $request->all();

        $activities->update($requestArray);

        Session::flash('flash_message', 'Slider updated successfully');
        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activities = Activity::findorFail($id);

        if($activities->image !== NULL) {
            if(file_exists(public_path('activities/'. $activities->image))) {
                unlink(public_path('activities/'. $activities->image));
            }
        }

        $activities->delete();

        Session::flash('flash_message', 'Activities deleted successfully');
        return redirect()->route('activities.index');
    }
}
