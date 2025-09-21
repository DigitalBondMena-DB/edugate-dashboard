<?php

namespace App\Http\Controllers\BackEnd;

use App\Major;
use App\FacultyUniversity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreMajorRequest;
use App\Http\Requests\Backend\UpdateMajorRequest;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Major::latest()->paginate(10);

        return view('backend.majors.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultyUniversities = DB::table('faculty_university')
                    ->join('universities', 'faculty_university.university_id', '=', 'universities.id')
                    ->join('faculties', 'faculty_university.faculty_id', '=', 'faculties.id')
                    ->select('faculty_university.*', 'universities.ar_name as university_name', 'faculties.ar_name as faculty_name')
                    ->orderBy('id', 'desc')
                    ->get();
                    
        // dd($facultyUniversities);
        return view('backend.majors.create', compact('facultyUniversities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMajorRequest $request)
    {
        $requestArray = $request->all();

        $major = Major::create($requestArray);

        if(isset($requestArray['facultyUniversities']) && !empty($requestArray['facultyUniversities'])) {
            $major->faculty_major_universities()->sync($requestArray['facultyUniversities']);
        }

        Session::flash('flash_message', 'Major added successfully!');
        return redirect()->route('majors.index');
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
        $row = Major::findorFail($id);

        $facultyUniversities = DB::table('faculty_university')
                                    ->join('universities', 'faculty_university.university_id', '=', 'universities.id')
                                    ->join('faculties', 'faculty_university.faculty_id', '=', 'faculties.id')
                                    ->select('faculty_university.*', 'universities.ar_name as university_name', 'faculties.ar_name as faculty_name')
                                    ->orderBy('id', 'desc')
                                    ->get();

        $selectedFacultyUniversities = [];
        
        $selectedFacultyUniversities = $row->faculty_major_universities()->pluck('faculty_university_id')->toArray();

        return view('backend.majors.edit', compact('row', 'facultyUniversities', 'selectedFacultyUniversities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMajorRequest $request, $id)
    {
        $major = Major::findorFail($id);

        $requestArray = $request->all();

        $major->update($requestArray);

        if(isset($requestArray['facultyUniversities']) && !empty($requestArray['facultyUniversities'])) {
            $major->faculty_major_universities()->sync($requestArray['facultyUniversities']);
        }

        Session::flash('flash_message', 'Major updated successfully!');
        return redirect()->route('majors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
