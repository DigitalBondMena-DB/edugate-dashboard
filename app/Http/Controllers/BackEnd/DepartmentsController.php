<?php

namespace App\Http\Controllers\BackEnd;

use App\Faculty;
use App\Department;
use App\University;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreDepartmentRequest;
use App\Http\Requests\Backend\UpdateDepartmentRequest;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Department::latest()->paginate(10);

        return view('backend.departments.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultyMajorUniversities = DB::table('faculty_major_university')
                                        ->join('faculty_university', 'faculty_major_university.faculty_university_id', '=', 'faculty_university.id')
                                        ->join('majors', 'faculty_major_university.major_id', '=', 'majors.id')
                                        ->select('faculty_major_university.*', 'faculty_university.university_id as university_id',
                                        'faculty_university.faculty_id as faculty_id',
                                        'majors.en_name as major_name')
                                        ->orderBy('id', 'desc')
                                        ->get();

        foreach($facultyMajorUniversities as $facultyMajorUniversity) {
            $university = University::findorFail($facultyMajorUniversity->university_id);
            $faculty = Faculty::findorFail($facultyMajorUniversity->faculty_id);
            
            $facultyMajorUniversity->university_name = $university->en_name;
            $facultyMajorUniversity->faculty_name = $faculty->en_name;
        }
        
        return view('backend.departments.create', compact('facultyMajorUniversities' , 'university' , 'faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('departments'), $fileName);
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('departments'), $fileName1);
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

        $requestArray = [
         'en_slug' => Str::slug($request->en_name), 'ar_slug' => $ar_slug,
         'featured_image' => $fileName,
         'banner_image' => $fileName1
        ] + $request->all();
 
        $department = Department::create($requestArray);

        if(isset($requestArray['facultyMajorUniversities']) && !empty($requestArray['facultyMajorUniversities'])) {
            $department->faculty_major_department_universities()->sync($requestArray['facultyMajorUniversities']);
        }

        Session::flash('flash_message', 'Department added successfully!');
        return redirect()->route('departments.index');
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
        $row = Department::findorFail($id);

        $facultyMajorUniversities = DB::table('faculty_major_university')
                                        ->join('faculty_university', 'faculty_major_university.faculty_university_id', '=', 'faculty_university.id')
                                        ->join('majors', 'faculty_major_university.major_id', '=', 'majors.id')
                                        ->select('faculty_major_university.*', 'faculty_university.university_id as university_id',
                                        'faculty_university.faculty_id as faculty_id',
                                        'majors.en_name as major_name')
                                        ->orderBy('id', 'desc')
                                        ->get();

        foreach($facultyMajorUniversities as $facultyMajorUniversity) {
            $university = University::findorFail($facultyMajorUniversity->university_id);
            $faculty = Faculty::findorFail($facultyMajorUniversity->faculty_id);

            $facultyMajorUniversity->university_name = $university->en_name;
            $facultyMajorUniversity->faculty_name = $faculty->en_name;
        }

        $selectedFacultyMajorUniversities = $row->faculty_major_department_universities()->pluck('faculty_major_university_id')->toArray();

        return view('backend.departments.edit', compact('row', 'facultyMajorUniversities', 'selectedFacultyMajorUniversities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $department = Department::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('departments'), $fileName);

            if($department->featured_image !== NULL) {
                if(file_exists(public_path('departments/'. $department->featured_image))) {
                    unlink(public_path('departments/'. $department->featured_image));
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('departments'), $fileName1);

            if($department->banner_image !== NULL) {
                if(file_exists(public_path('departments/'. $department->banner_image))) {
                    unlink(public_path('departments/'. $department->banner_image));
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
            'featured_image' => $request->hasFile('featured_image') ? $fileName : $department->featured_image, 
            'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $department->banner_image,
        ] + $request->all();

        $department->update($requestArray);

        if(isset($requestArray['facultyMajorUniversities']) && !empty($requestArray['facultyMajorUniversities'])) {
            $department->faculty_major_department_universities()->sync($requestArray['facultyMajorUniversities']);
        }

        Session::flash('flash_message', 'Department updated successfully!');
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $departments = Department::findorFail($id);

        if($departments->featured_image !== NULL) {
            if(file_exists(public_path('departments/'. $departments->featured_image))) {
                unlink(public_path('departments/'. $departments->featured_image));
            }
        }

        if($departments->banner_image !== NULL) {
            if(file_exists(public_path('departments/'. $departments->banner_image))) {
                unlink(public_path('departments/'. $departments->banner_image));
            }
        }

        $departments->delete();

        Session::flash('flash_message', 'Department deleted successfully!');
        return redirect()->route('departments.index');
    }
}
