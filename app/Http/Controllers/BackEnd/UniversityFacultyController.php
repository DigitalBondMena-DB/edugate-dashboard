<?php

namespace App\Http\Controllers\BackEnd;

use App\Major;
use App\FacultyUniversity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateFacultyUniversityRequest;

class UniversityFacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = DB::table('faculty_university')
                    ->join('universities', 'faculty_university.university_id', '=', 'universities.id')
                    ->join('faculties', 'faculty_university.faculty_id', '=', 'faculties.id')
                    ->select('faculty_university.*', 'universities.ar_name as university_name', 'faculties.ar_name as faculty_name')
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        foreach($rows as $row) {
            $facultyUniversity = FacultyUniversity::findorFail($row->id);
            $majorsAvailable = $facultyUniversity->majors()->get();
            $row->majors = $majorsAvailable;
        }

        return view('backend.university_faculty.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $row = DB::table('faculty_university')
                                ->join('universities', 'faculty_university.university_id', '=', 'universities.id')
                                ->join('faculties', 'faculty_university.faculty_id', '=', 'faculties.id')
                                ->where('faculty_university.id', '=', $id)
                                ->select('faculty_university.*', 'universities.ar_name as university_name', 'faculties.ar_name as faculty_name')
                                ->first();

        $majors = Major::get();

        $selectedMajors = DB::table('faculty_major_university')
                                ->where('faculty_university_id', '=', $row->id)
                                ->pluck('faculty_major_university.major_id')
                                ->toArray();

        return view('backend.university_faculty.edit', compact('row', 'majors', 'selectedMajors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacultyUniversityRequest $request, $id)
    {        
        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('faculties'), $fileName);
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('faculties'), $fileName1);
        }

        if($request->hasFile('logo')) {
            $file2 = $request->file('logo');
            $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('faculties'), $fileName2);
        }

        $university_faculty = FacultyUniversity::findorFail($id);

        $requestArray = $request->all();

        DB::table('faculty_university')
                ->where('id', '=', $university_faculty->id)
                ->update([
                    'en_faculty_vision' => $request->en_faculty_vision,
                    'ar_faculty_vision' => $request->ar_faculty_vision,
                    'en_faculty_mission' => $request->en_faculty_mission,
                    'ar_faculty_mission' => $request->ar_faculty_mission,
                    'en_address' => $request->en_address,
                    'ar_address' => $request->ar_address,
                    'faculty_phone' => $request->faculty_phone,
                    'faculty_site' => $request->faculty_site,
                    'foundation_year' => $request->foundation_year,
                    'percentage' => $request->percentage,
                    'featured_image' => $request->hasFile('featured_image') ? $fileName : $university_faculty->featured_image,
                    'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $university_faculty->banner_image,
                    'logo' => $request->hasFile('logo') ? $fileName2 : $university_faculty->logo,
                ]);

        if(isset($requestArray['majors']) && !empty($requestArray['majors'])) {
            $university_faculty->majors()->sync($requestArray['majors']);
        }

        Session::flash('flash_message', 'Faculty/University updated successfully!');
        return redirect()->route('university_faculty_percentage.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university_faculty = FacultyUniversity::findorFail($id);

        $university_faculty->delete();

        Session::flash('flash_message', 'Faculty/University deleted successfully!');
        return redirect()->route('university_faculty_percentage.index');
    }
}
