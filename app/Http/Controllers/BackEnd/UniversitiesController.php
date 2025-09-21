<?php

namespace App\Http\Controllers\BackEnd;

use App\Faculty;
use App\University;
use App\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreUniversityRequest;
use App\Http\Requests\Backend\UpdateUniversityRequest;

class UniversitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = University::latest()->paginate(10);

        return view('backend.universities.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::get();
        $faculties = Faculty::get();
        return view('backend.universities.create', compact('destinations', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniversityRequest $request)
    {
        $requestArray = $request->all();

        $destination = Destination::findorFail($request->destination_id);

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('universities'), $fileName);
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('universities'), $fileName1);
        }

        if($request->hasFile('logo')) {
            $file2 = $request->file('logo');
            $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('universities'), $fileName2);
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
        'en_slug' => Str::slug($request->en_name),
        'ar_slug' => $ar_slug,
        'ar_university_type' => $request->en_university_type == 'Government' ? 'حكومية' : 'خاصة',
        'featured_image' => $fileName,
        'banner_image' => $fileName1, 
        'logo' => $fileName2
        ] + $request->all();
 
        $university = $destination->universities()->create($requestArray);

        if(isset($requestArray['faculties']) && !empty($requestArray['faculties'])) {
            $university->faculties()->sync($requestArray['faculties']);
        }

        Session::flash('flash_message', 'University added successfully!');
        return redirect()->route('universities.index');
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
        $row = University::findorFail($id);

        $destinations = Destination::get();

        $faculties = Faculty::get();

        $selectedFaculties = [];

        $selectedFaculties = $row->faculties()->pluck('faculties.id')->toArray();

        return view('backend.universities.edit', compact('row', 'destinations', 'faculties', 'selectedFaculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUniversityRequest $request, $id)
    {
        $University = University::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('universities'), $fileName);

            if($University->featured_image !== NULL) {
                if(file_exists(public_path('universities/'. $University->featured_image))) {
                    unlink(public_path('universities/'. $University->featured_image));
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $file1 = $request->file('banner_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('universities'), $fileName1);

            if($University->banner_image !== NULL) {
                if(file_exists(public_path('universities/'. $University->banner_image))) {
                    unlink(public_path('universities/'. $University->banner_image));
                }
            }
        }

        if($request->hasFile('logo')) {
            $file2 = $request->file('logo');
            $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('universities'), $fileName2);

            if($University->logo !== NULL) {
                if(file_exists(public_path('universities/'. $University->logo))) {
                    unlink(public_path('universities/'. $University->logo));
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


        $requestArray = [
            'en_slug' => Str::slug($request->en_name),
            'ar_slug' => $ar_slug, 
            'ar_university_type' => $request->en_university_type == 'Government' ? 'حكومية' : 'خاصة',
            'featured_image' => $request->hasFile('featured_image') ? $fileName : $University->featured_image, 
            'banner_image' => $request->hasFile('banner_image') ? $fileName1 : $University->banner_image,
            'logo' => $request->hasFile('logo') ? $fileName2 : $University->logo,
            'destination_id' => $request->destination_id
        ] + $request->all();

        $University->update($requestArray);

        if(isset($requestArray['faculties']) && !empty($requestArray['faculties'])) {
            $University->faculties()->sync($requestArray['faculties']);
        }

        Session::flash('flash_message', 'University updated successfully!');
        return redirect()->route('universities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $University = University::findorFail($id);

        if($University->featured_image !== NULL) {
            if(file_exists(public_path('universities/'. $University->featured_image))) {
                unlink(public_path('universities/'. $University->featured_image));
            }
        }

        if($University->banner_image !== NULL) {
            if(file_exists(public_path('universities/'. $University->banner_image))) {
                unlink(public_path('universities/'. $University->banner_image));
            }
        }

        if($University->logo !== NULL) {
            if(file_exists(public_path('universities/'. $University->logo))) {
                unlink(public_path('universities/'. $University->logo));
            }
        }
        
        $University->delete();

        Session::flash('flash_message', 'University deleted successfully!');
        return redirect()->route('universities.index');
    }
}
