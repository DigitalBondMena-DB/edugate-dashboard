<?php

namespace App\Http\Controllers\BackEnd;

use App\Department;
use App\Specialization;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreSpecializationRequest;
use App\Http\Requests\Backend\UpdateSpecializationRequest;

class SpecializationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Specialization::latest()->paginate(10);

        return view('backend.specializations.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        return view('backend.specializations.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecializationRequest $request)
    {
        $requestArray = $request->all();

        $department = Department::findorFail($request->department_id);

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('specializations'), $fileName);
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('specializations'), $fileName1);
        }

        function make_slug($string, $separator = '-') {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

            // Remove multiple dashes or whitespaces or underscores
            $string = preg_replace("/[\s\-]+/", " ", $string);

            // Convert whitespaces and underscore to the given separator
            $string = preg_replace("/[\s_]/", $separator, $string);

            return $string;
        }

        $ar_slug = make_slug($request->ar_name);

        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug, 'featured_image' => $fileName, 'banner_image' => $fileName1] + $request->all();
 
        $department->specializations()->create($requestArray);


        Session::flash('flash_message', 'Specialization created successfully!');
        return redirect()->route('specializations.index');
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
        $row = Specialization::findorFail($id);
        $departments = Department::get();

        return view('backend.specializations.edit', compact('row', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecializationRequest $request, $id)
    {
        $Specialization = Specialization::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('specializations'), $fileName);

            if($Specialization->featured_image !== NULL) {
                if(file_exists(public_path('specializations/'. $Specialization->featured_image))) {
                    unlink(public_path('specializations/'. $Specialization->featured_image));
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('specializations'), $fileName1);

            if($Specialization->banner_image !== NULL) {
                if(file_exists(public_path('specializations/'. $Specialization->banner_image))) {
                    unlink(public_path('specializations/'. $Specialization->banner_image));
                }
            }
        }

        function make_slug($string, $separator = '-') {
            $string = trim($string);
            $string = mb_strtolower($string, 'UTF-8');

            $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

            // Remove multiple dashes or whitespaces or underscores
            $string = preg_replace("/[\s\-]+/", " ", $string);

            // Convert whitespaces and underscore to the given separator
            $string = preg_replace("/[\s_]/", $separator, $string);

            return $string;
        }

        $ar_slug = make_slug($request->ar_name);


        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug, 
            'featured_image' => $request->hasFile('featured_image') ? $fileName : $Specialization->featured_image, 
            'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $Specialization->banner_image,
            'department_id' => $request->department_id
        ] + $request->all();

        $Specialization->update($requestArray);

        Session::flash('flash_message', 'Specialization updated successfully!');
        return redirect()->route('specializations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Specializations = Specialization::findorFail($id);

        if($Specializations->featured_image !== NULL) {
            if(file_exists(public_path('specializations/'. $Specializations->featured_image))) {
                unlink(public_path('specializations/'. $Specializations->featured_image));
            }
        }

        if($Specializations->banner_image !== NULL) {
            if(file_exists(public_path('specializations/'. $Specializations->banner_image))) {
                unlink(public_path('specializations/'. $Specializations->banner_image));
            }
        }

        $Specializations->delete();

        Session::flash('flash_message', 'Specialization deleted successfully!');
        return redirect()->route('specializations.index');
    }
}
