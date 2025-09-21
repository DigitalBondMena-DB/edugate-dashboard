<?php

namespace App\Http\Controllers\BackEnd;

use App\Faculty;
use App\University;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreFacultyRequest;
use App\Http\Requests\Backend\UpdateFacultyRequest;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Faculty::latest()->paginate(10);

        return view('backend.faculties.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::get();

        return view('backend.faculties.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacultyRequest $request)
    {
        $requestArray = $request->all();

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

        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug] + $request->all();
        
        $faculty = Faculty::create($requestArray);

        if(isset($requestArray['universities']) && !empty($requestArray['universities'])) {
            $faculty->universities()->sync($requestArray['universities']);
        }

        Session::flash('flash_message', 'Faculty created successfully!');
        return redirect()->route('faculties.index');
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
        $row = Faculty::findorFail($id);

        $universities = University::get();

        $selectedUniversities = [];

        $selectedUniversities = $row->universities()->pluck('universities.id')->toArray();

        return view('backend.faculties.edit', compact('row', 'universities', 'selectedUniversities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacultyRequest $request, $id)
    {        
        $Faculties = Faculty::findorFail($id);

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

        $requestArray = ['en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug] + $request->all();

        $Faculties->update($requestArray);

        if(isset($requestArray['universities']) && !empty($requestArray['universities'])) {
            $Faculties->universities()->sync($requestArray['universities']);
        }

        Session::flash('flash_message', 'Faculty updated successfully!');
        return redirect()->route('faculties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Faculties = Faculty::findorFail($id);

        if($Faculties->featured_image !== NULL) {
            if(file_exists(public_path('faculties/'. $Faculties->featured_image))) {
                unlink(public_path('faculties/'. $Faculties->featured_image));
            }
        }
        if($Faculties->banner_image !== NULL) {
            if (file_exists(public_path('faculties/'. $Faculties->banner_image))) {
                unlink(public_path('faculties/'. $Faculties->banner_image));
            }
        }

        $Faculties->delete();

        Session::flash('flash_message', 'Faculty deleted successfully!');
        return redirect()->route('faculties.index');
    }
}
