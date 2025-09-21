<?php

namespace App\Http\Controllers;

use App\User;
use App\About;
use App\Major;
use App\Client;
use App\Slider;
use App\Contact;
use App\Faculty;
use App\Gallery;
use App\Service;
use App\Activity;
use App\ContactUs;
use App\NewArticle;
use App\Department;
use App\University;
use App\EventDetail;
use App\Destination;
use App\EventGallary;
use App\FileMovement;
use App\EventCategery;
use App\AdFormCountries;
use App\FacultyUniversity;
use App\FacultyMajorUniversity;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Frontend\StoreFeedbackInfoRequest;
use App\Http\Requests\Frontend\StoreUserAcademicInfoRequest;
use App\Http\Requests\Frontend\StoreUserPersonalInfoRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['showPersonalInfo', 'submitPersonalInfo', 'showAcademicInfo', 'submitAcademicInfo', 'showAdmissionInfo', 'submitAdmissionInfo']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
    public function admission_request()
    {
        return view('frontend.admission_request');
    }
    public function index()
    {
        $sliders = Slider::latest()->get();
        $clients = Client::latest()->get();
        $about = About::first();
        $contact = ContactUs::first();
        $eventCategoeeis = EventCategery::get();
        $eventDetails = EventDetail::get();
        $eventGallary = EventGallary::get();
        $services = Service::get();
        $activities = Activity::get();
        $doctors = User::where('role' , 'academic-guide')->get();
        
        return view('frontend.home', compact('sliders' , 'clients' , 'about' , 'eventDetails' , 'eventGallary' , 'services' , 'activities' , 'eventCategoeeis' , 'doctors' , 'contact'));
    }
    
    public function aboutUs() {
        $about = About::first();
        $services = Service::get();
        $clients = Client::latest()->get();
        return view('frontend.about-us', compact('about' , 'services' , 'clients'));
    }
    
    public function clients() {
        $clients = Client::latest()->limit(10)->get();
        $clientsSchools = Client::latest()->get();
        return view('frontend.clients', compact('clients' , 'clientsSchools'));
    }
    
    public function eventCategories(EventCategery $eventCategery)
    {
        
        $eventDetails = EventDetail::where('event_category_id' , $eventCategery->id)->get();
        $eventGallarys = EventGallary::get();
        
        return view('frontend.event', compact('eventCategery' , 'eventDetails' , 'eventGallarys'));
    }
    
    public function gallery()
    {
        $eventCategoeeis = EventCategery::get();
        $eventDetails = EventDetail::get();
        $eventGallarys = EventGallary::get();
        $contact = ContactUs::first();
        return view('frontend.gallery' , compact('eventGallarys' , 'eventDetails' , 'eventCategoeeis' , 'contact')) ;
    }
    
    public function articles()
    {
        $articles = NewArticle::get();
        return view('frontend.article' , compact('articles')) ;
    }

    public function contactUs() {        
        return view('frontend.contact-us');
    }

    public function adForm(AdFormCountries $adFormCountries) {
        
        $adFormAreas = $adFormCountries->adFormAreas()->get();

        return view('frontend.ad_form', compact('adFormCountries', 'adFormAreas'));
    }

    public function filterUniversities(Request $request) {
        $destination = Destination::findorFail($request->destination_id);

        $universities = [];

        $uniId = $destination->universities()->pluck('universities.id')->toArray();

        if(app()->getLocale() == 'en') {
            $uniName = $destination->universities()->pluck('universities.en_name')->toArray();
        } else {
            $uniName = $destination->universities()->pluck('universities.ar_name')->toArray();
        }

        $universities[] = [
            'id' => $uniId,
            'name' => $uniName
        ];

        return $universities;
    }

    public function filterColleges(Request $request) {
        $university = University::findorFail($request->university_id);

        $faculties = [];

        $facUniId = [];
        $facName = [];

        foreach($university->faculties as $faculty) {
            $facUniId[] = $faculty->pivot->id;
            if(app()->getLocale() == 'en') {
                $facName[] = $faculty->en_name;
            } else {
                $facName[] = $faculty->ar_name;
            }
        }

        $faculties[] = [
            'id' => $facUniId,
            'name' => $facName,
            'university_name' => app()->getLocale() == 'en' ? $university->en_name : $university->ar_name
        ];

        return $faculties;
    }

    public function filterMajors(Request $request) {
        $facUniId = FacultyUniversity::findorFail($request->fac_uni_id);
        $faculty = Faculty::findorFail($facUniId->faculty_id);
        $university = University::findorFail($facUniId->university_id);

        $majors = [];

        $facUniMajorId = [];
        $majorName = [];

        foreach($facUniId->majors as $major) {
            $facUniMajorId[] = $major->pivot->id;
            if(app()->getLocale() == 'en') {
                $majorName[] = $major->en_name;
            } else {
                $majorName[] = $major->ar_name;
            }
        }

        $majors[] = [
            'id' => $facUniMajorId,
            'name' => $majorName,
            'faculty_name' => app()->getLocale() == 'en' ? $faculty->en_name : $faculty->ar_name,
            'university_name' => app()->getLocale() == 'en' ? $university->en_name : $university->ar_name
        ];

        return $majors;
    }

    public function filterDepartments(Request $request) {
        $facultyMajorUniversity = FacultyMajorUniversity::findorFail($request->fac_uni_major_id);

        $departments = [];

        $departmentsId = [];
        $departmentsName = [];

        foreach($facultyMajorUniversity->departments as $department) {
            $departmentsId[] = $department->id;
            if(app()->getLocale() == 'en') {
                $departmentsName[] = $department->en_name;
            } else {
                $departmentsName[] = $department->ar_name;
            }
        }

        $departments[] = [
            'id' => $departmentsId,
            'name' => $departmentsName,
        ];

        return $departments;
    } 

    public function filterUniversitiesAdmission(Request $request) {
        $destination = Destination::findorFail($request->admission_destination_id);

        $universities = [];

        $uniId = $destination->universities()->pluck('universities.id')->toArray();

        if(app()->getLocale() == 'en') {
            $uniName = $destination->universities()->pluck('universities.en_name')->toArray();
        } else {
            $uniName = $destination->universities()->pluck('universities.ar_name')->toArray();
        }

        $universities[] = [
            'id' => $uniId,
            'name' => $uniName
        ];

        return $universities;
    }

    public function filterCollegesAdmission(Request $request) {
        $university = University::findorFail($request->admission_university_id);

        $faculties = [];

        $facUniId = [];
        $facName = [];

        foreach($university->faculties as $faculty) {
            $facUniId[] = $faculty->pivot->id;
            if(app()->getLocale() == 'en') {
                $facName[] = $faculty->en_name;
            } else {
                $facName[] = $faculty->ar_name;
            }
        }

        $faculties[] = [
            'id' => $facUniId,
            'name' => $facName,
            'university_name' => app()->getLocale() == 'en' ? $university->en_name : $university->ar_name
        ];

        return $faculties;
    }

    public function filterMajorsAdmission(Request $request) {
        $facUniId = FacultyUniversity::findorFail($request->admission_fac_uni_id);
        $faculty = Faculty::findorFail($facUniId->faculty_id);
        $university = University::findorFail($facUniId->university_id);

        $majors = [];

        $facUniMajorId = [];
        $majorName = [];

        foreach($facUniId->majors as $major) {
            $facUniMajorId[] = $major->pivot->id;
            if(app()->getLocale() == 'en') {
                $majorName[] = $major->en_name;
            } else {
                $majorName[] = $major->ar_name;
            }
        }

        $majors[] = [
            'id' => $facUniMajorId,
            'name' => $majorName,
            'faculty_name' => app()->getLocale() == 'en' ? $faculty->en_name : $faculty->ar_name,
            'university_name' => app()->getLocale() == 'en' ? $university->en_name : $university->ar_name
        ];

        return $majors;
    }

    public function filterDepartmentsAdmission(Request $request) {
        $facultyMajorUniversity = FacultyMajorUniversity::findorFail($request->admission_fac_uni_major_id);

        $departments = [];

        $departmentsId = [];
        $departmentsName = [];

        foreach($facultyMajorUniversity->departments as $department) {
            $departmentsId[] = $department->id;
            if(app()->getLocale() == 'en') {
                $departmentsName[] = $department->en_name;
            } else {
                $departmentsName[] = $department->ar_name;
            }
        }

        $departments[] = [
            'id' => $departmentsId,
            'name' => $departmentsName,
        ];

        return $departments;
    }

    public function search(Request $request) {
        if(isset($request->destination_id) && !isset($request->university_id) && !isset($request->fac_uni_id) && !isset($request->fac_uni_major_id)) {
            $country = Destination::findorFail($request->destination_id);

            return view('frontend.search_results.search_results_destination', compact('country'));
        } elseif(isset($request->destination_id) && isset($request->university_id) && !isset($request->fac_uni_id) && !isset($request->fac_uni_major_id)) {
            $country = Destination::findorFail($request->destination_id);

            $university = University::findorFail($request->university_id);

            return view('frontend.search_results.search_results_university', compact('country', 'university'));
        } elseif(isset($request->destination_id) && isset($request->university_id) && isset($request->fac_uni_id) && !isset($request->fac_uni_major_id)) {
            $universityFaculty = FacultyUniversity::findorFail($request->fac_uni_id);

            return view('frontend.search_results.search_results_faculty', compact('universityFaculty'));
        } elseif(isset($request->destination_id) && isset($request->university_id) && isset($request->fac_uni_id) && isset($request->fac_uni_major_id)) {            
            $country = Destination::findorFail($request->destination_id);
            $facultyUniversity = FacultyUniversity::findorFail($request->fac_uni_id);
            $university = University::findorFail($facultyUniversity->university_id);
            $faculty = Faculty::findorFail($facultyUniversity->faculty_id);

            if(app()->getLocale() == 'en') {
                return redirect()->route('faculty', [$country->en_slug, $university->en_slug, $faculty->en_slug]);
            } else {
                return redirect()->route('faculty', [$country->ar_slug, $university->ar_slug, $faculty->ar_slug]);
            }

        }
    }

    

    public function sendInquiry(StoreFeedbackInfoRequest $request) {
    
        $requestArray = $request->all();

        Contact::create($requestArray);

        if(app()->getLocale() == 'en') {
            Session::flash('flash_message', 'Message sent successfully');
        } else {
            Session::flash('flash_message', 'تم ارسال الرسالة بنجاح');
        }

        return redirect()->route('contact-sucess');
    }
    
    public function contactsucess(){
        return view('frontend.edugatethanks');
    }
    

    public function faq() {
        return view('frontend.faq');
    }
    
    public function destination(Destination $country) {
        
        return view('frontend.destination', compact('country'));
    }

    

    public function university(Destination $country, University $university) {
        return view('frontend.university', compact('country', 'university'));
    }

    public function faculty(Destination $country, University $university, Faculty $faculty) {
        $facultyUniversity = FacultyUniversity::where('university_id', $university->id)->where('faculty_id', $faculty->id)->first();
        return view('frontend.faculty', compact('country', 'university', 'faculty', 'facultyUniversity'));
    }

    public function showPersonalInfo() {
        $userPersonalInfo = auth()->user()->personal_info()->first();
        if($userPersonalInfo) {
            return view('frontend.personal_info', compact('userPersonalInfo'));
        } else {
            return view('frontend.personal_info');
        }
    }

    public function submitPersonalInfo(StoreUserPersonalInfoRequest $request) {
        
        $requestArray = $request->except('_token');

        if(auth()->user()->personal_info()->first()) {
            $userPersonalInfo = auth()->user()->personal_info()->first();
            if($userPersonalInfo->degree_needed != $requestArray['degree_needed']) {
                auth()->user()->personal_info()->update($requestArray);
                if(auth()->user()->academic_info()->first()) {
                    auth()->user()->academic_info()->delete();
                }
            } else {
                auth()->user()->personal_info()->update($requestArray);
            }
            auth()->user()->update([
                'degree_needed' => $requestArray['degree_needed']
            ]);
        } else {
            auth()->user()->personal_info()->create($requestArray);
            auth()->user()->update([
                'degree_needed' => $requestArray['degree_needed']
            ]);
        }

        if(auth()->user()->academic_info()->first()) {
            if(app()->getLocale() == 'en') {
                Session::flash('flash_message', 'Personal Info updated successfully');
            } else {
                Session::flash('flash_message', 'تم تحديث المعلومات الشخصية بنجاح');
            }
            Session::flash('flash_class', 'alert alert-success');
            return redirect()->route('show-personal-info');
        } else {
            if(app()->getLocale() == 'en') {
                Session::flash('flash_message', 'Personal Info updated successfully... You can update your academic info now!');
            } else {
                Session::flash('flash_message', 'تم تحديث المعلومات الشخصية بنجاح ... يمكنك تحديث معلوماتك الأكاديمية الآن');
            }
            Session::flash('flash_class', 'alert alert-success');
            return redirect()->route('show-academic-info');
        }

    }

    public function showAcademicInfo() {
        if(auth()->user()->personal_info()->first()) {
            $userPersonalInfo = auth()->user()->personal_info()->first();
            $academicInfo = auth()->user()->academic_info()->first();
            if($academicInfo) {
                if($userPersonalInfo->degree_needed == 'Bachelor') {
                    return view('frontend.academic_info_school', compact('academicInfo'));
                } elseif($userPersonalInfo->degree_needed == 'Master') {
                    return view('frontend.academic_info_university', compact('academicInfo'));
                } else {
                    return view('frontend.academic_info_master_university', compact('academicInfo'));
                } 
            } else {
                if($userPersonalInfo->degree_needed == 'Bachelor') {
                    return view('frontend.academic_info_school');
                } elseif($userPersonalInfo->degree_needed == 'Master') {
                    return view('frontend.academic_info_university');
                }else {
                    return view('frontend.academic_info_master_university', compact('academicInfo'));
                }

            }
        } else {
            if(app()->getLocale() == 'en') {
                Session::flash('flash_message', 'You cannot fill in the academic information before filling in the personal information. Please fill in the personal information first');
            } else {
                Session::flash('flash_message', 'لا يمكنك ملء المعلومات الاكاديميه قبل ملء المعلومات الشخصيه , برجاء ملئ المعلومات الشخصيه اولا');
            }
            Session::flash('flash_class', 'alert alert-danger');
            return redirect()->route('show-personal-info');
        }
    }

    public function submitAcademicInfo(StoreUserAcademicInfoRequest $request) {
        
        $requestArray = $request->except('_token');

        if(auth()->user()->academic_info()->first()) {
            auth()->user()->academic_info()->update($requestArray);
        } else {
            auth()->user()->academic_info()->create($requestArray);
        }

        if(app()->getLocale() == 'en') {
            Session::flash('flash_message', 'Academic Info updated successfully');
        } else {
            Session::flash('flash_message', 'تم تحديث المعلومات الأكاديمية بنجاح');
        }
        Session::flash('flash_class', 'alert alert-success');
        return redirect()->route('show-academic-info');

    }

    public function showAdmissionInfo() {
        $userPersonalInfo = auth()->user()->personal_info()->first();
        return view('frontend.admission_form', compact('userPersonalInfo'));
    }

    public function submitAdmissionInfo(Request $request) {

        $userPersonalInfo = auth()->user()->personal_info()->first();
        $userAcademicInfo = auth()->user()->academic_info()->first();

        if(isset($request->page)) {

            $this->validate($request, [
                'destination_id' => 'required',
                'university_id' => 'required',
                'faculty_id' => 'required',
            ]);

            if($userAcademicInfo) {
                auth()->user()->user_admission_forms()->create([
                    'destination' => $request->destination_id,
                    'university' => $request->university_id,
                    'faculty' => $request->faculty_id,
                    'degree_needed' => $userPersonalInfo->degree_needed,
                    'day' => Carbon::now()->format('d'),
                    'month' => Carbon::now()->format('F'),
                    'year' => Carbon::now()->format('Y'),
                ]);
        
                if(app()->getLocale() == 'en') {
                    Session::flash('flash_message', 'Admission Form submitted successfully');
                } else {
                    Session::flash('flash_message', 'تم تقديم نموذج القبول بنجاح');
                }
                return redirect()->route('home');
            } elseif(!$userPersonalInfo) {
                if(app()->getLocale() == 'en') {
                    Session::flash('flash_message', 'Please fill in the personal information and then fill in the academic information');
                } else {
                    Session::flash('flash_message', 'يرجى ملئ المعلومات الشخصيه ثم ملئ المعلومات الاكاديمية');
                }
                Session::flash('flash_class', 'alert alert-danger');
                return redirect()->route('show-personal-info');
            } else {
                if(app()->getLocale() == 'en') {
                    Session::flash('flash_message', 'Please fill out the academic information first, then fill in the university application');
                } else {
                    Session::flash('flash_message', 'يرجى ملئ المعلومات الاكاديمية اولا ثم ملئ الطلب الجامعي ');
                }
                Session::flash('flash_class', 'alert alert-danger');
                return redirect()->route('show-academic-info');
            }
        } else {

            $this->validate($request, [
                'admission_destination_id' => 'required|integer',
                'admission_university_id' => 'required|integer',
                'admission_fac_uni_id' => 'required|integer',
                'admission_fac_uni_major_id' => 'required|integer',
                'admission_department_id' => 'required|integer'
            ]);

            $destination = Destination::findorFail($request->admission_destination_id);
            $university = University::findorFail($request->admission_university_id);
            $facUniId = FacultyUniversity::findorFail($request->admission_fac_uni_id);
            $faculty = Faculty::findorFail($facUniId->faculty_id);
            $facultyMajorUniversity = FacultyMajorUniversity::findorFail($request->admission_fac_uni_major_id);
            $major = Major::findorFail($facultyMajorUniversity->major_id);
            $department = Department::findorFail($request->admission_department_id);
    
            if($userAcademicInfo) {
                auth()->user()->user_admission_forms()->create([
                    'destination' => $destination->en_name,
                    'university' => $university->en_name,
                    'faculty' => $faculty->en_name,
                    'major' => $major->en_name,
                    'department' => $department->en_name,
                    'degree_needed' => $userPersonalInfo->degree_needed,
                    'day' => Carbon::now()->format('d'),
                    'month' => Carbon::now()->format('F'),
                    'year' => Carbon::now()->format('Y'),
                ]);
        
                if(app()->getLocale() == 'en') {
                    Session::flash('flash_message', 'Admission Form submitted successfully');
                } else {
                    Session::flash('flash_message', 'تم تقديم نموذج القبول بنجاح');
                }
                return redirect()->route('home');
            } elseif(!$userPersonalInfo) {
                if(app()->getLocale() == 'en') {
                    Session::flash('flash_message', 'Please fill in the personal information and then fill in the academic information');
                } else {
                    Session::flash('flash_message', 'يرجى ملئ المعلومات الشخصيه ثم ملئ المعلومات الاكاديمية');
                }
                Session::flash('flash_class', 'alert alert-danger');
                return redirect()->route('show-personal-info');
            } else {
                if(app()->getLocale() == 'en') {
                    Session::flash('flash_message', 'Please fill out the academic information first, then fill in the university application');
                } else {
                    Session::flash('flash_message', 'يرجى ملئ المعلومات الاكاديمية اولا ثم ملئ الطلب الجامعي ');
                }
                Session::flash('flash_class', 'alert alert-danger');
                return redirect()->route('show-academic-info');
            }
        }
        
        // dd($request->destination_id, $request->university_id, $facUniId->faculty_id, $facultyMajorUniversity->major_id, $request->department_id);


    }

    public function showPaperInfo(Request $request) {
        $admissionInfo = auth()->user()->user_admission_forms()->first();
        $user_movement = auth()->user()->file_movement()->first();

        if($admissionInfo) {
            if($admissionInfo->academic_guide != NULL) {
                if($user_movement) {
                    return view('frontend.paper_movement', compact('user_movement', 'admissionInfo'));
                } else {
                    return view('frontend.paper_movement');
                }
            } else {
                Session::flash('flash_class', 'alert alert-danger');
                Session::flash('flash_message', 'Academic Guide still not assigned to you... please wait');

                return redirect()->route('home');
            }
        } else {
            abort(404);
        }
    }

    public function submitFirstPaperInfo(Request $request) {

        $admissionInfo = auth()->user()->user_admission_forms()->first();
        $user_movement = auth()->user()->file_movement()->first();

        if($user_movement) {

            $this->validate($request, [
                'passport' => 'mimes:jpg,jpeg,png',
                'secondary_certificate' => 'mimes:jpg,jpeg,png',
                'birth_certificate' => 'mimes:jpg,jpeg,png'
            ]);
    
            if($request->hasFile('passport')) {

                if($user_movement->passport !== NULL) {
                    if (file_exists(public_path('movement/'. $user_movement->passport))) {
                        unlink(public_path('movement/'. $user_movement->passport));
                    }
                }

                $file = $request->file('passport');
                $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('movement'), $fileName);

            }
    
            if($request->hasFile('secondary_certificate')) {

                if($user_movement->secondary_certificate !== NULL) {
                    if (file_exists(public_path('movement/'. $user_movement->secondary_certificate))) {
                        unlink(public_path('movement/'. $user_movement->secondary_certificate));
                    }
                }

                $file1 = $request->file('secondary_certificate');
                $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
                $file1->move(public_path('movement'), $fileName1);
            }
    
            if($request->hasFile('birth_certificate')) {

                if($user_movement->birth_certificate !== NULL) {
                    if (file_exists(public_path('movement/'. $user_movement->birth_certificate))) {
                        unlink(public_path('movement/'. $user_movement->birth_certificate));
                    }
                }

                $file2 = $request->file('birth_certificate');
                $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
                $file2->move(public_path('movement'), $fileName2);
            }
    
            $user_movement->update([
                'passport' => $request->hasFile('passport') ? $fileName : $user_movement->passport,
                'secondary_certificate' => $request->hasFile('secondary_certificate') ? $fileName1 : $user_movement->secondary_certificate,
                'birth_certificate' => $request->hasFile('birth_certificate') ? $fileName2 : $user_movement->birth_certificate,
            ]);
    
            Session::flash('flash_class', 'alert alert-success');
            Session::flash('flash_message', 'Paper updated');
    
            return redirect()->route('show-movement-info');
        } else {
            $this->validate($request, [
                'passport' => 'required|mimes:jpg,jpeg,png',
                'secondary_certificate' => 'required|mimes:jpg,jpeg,png',
                'birth_certificate' => 'required|mimes:jpg,jpeg,png'
            ]);
    
            if($request->hasFile('passport')) {
                $file = $request->file('passport');
                $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('movement'), $fileName);
            }
    
            if($request->hasFile('secondary_certificate')) {
                $file1 = $request->file('secondary_certificate');
                $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
                $file1->move(public_path('movement'), $fileName1);
            }
    
            if($request->hasFile('birth_certificate')) {
                $file2 = $request->file('birth_certificate');
                $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
                $file2->move(public_path('movement'), $fileName2);
            }

            $admissionInfo->update([
                'registered' => 1,
                'paper_status' => 'مقبول'
            ]);
    
            FileMovement::create([
                'day' => Carbon::now()->format('d'),
                'month' => Carbon::now()->format('F'),
                'year' => Carbon::now()->format('Y'),
                'user_id' => auth()->user()->id,
                'passport' => $fileName,
                'secondary_certificate' => $fileName1,
                'birth_certificate' => $fileName2
            ]);
    
            Session::flash('flash_class', 'alert alert-success');
            Session::flash('flash_message', 'Paper submitted');
    
            return redirect()->route('show-movement-info');

        }

    }

    public function submitSecondPaperInfo(Request $request) {

            $admissionInfo = auth()->user()->user_admission_forms()->first();
            $user_movement = auth()->user()->file_movement()->first();

            if($admissionInfo->degree_needed == 'Bachelor') {
                
                $this->validate($request, [
                    'diploma' => 'mimes:jpg,jpeg,png',
                    'authorization' => 'mimes:jpg,jpeg,png',
                    'image' => 'mimes:jpg,jpeg,png',
                    'last_document' => 'mimes:jpg,jpeg,png'
                ]);
        
                if($request->hasFile('diploma')) {
    
                    if($user_movement->diploma !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->diploma))) {
                            unlink(public_path('movement/'. $user_movement->diploma));
                        }
                    }
    
                    $file = $request->file('diploma');
                    $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('movement'), $fileName);
    
                }
        
                if($request->hasFile('authorization')) {
    
                    if($user_movement->authorization !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->authorization))) {
                            unlink(public_path('movement/'. $user_movement->authorization));
                        }
                    }
    
                    $file1 = $request->file('authorization');
                    $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
                    $file1->move(public_path('movement'), $fileName1);
                }
        
                if($request->hasFile('image')) {
    
                    if($user_movement->image !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->image))) {
                            unlink(public_path('movement/'. $user_movement->image));
                        }
                    }
    
                    $file2 = $request->file('image');
                    $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
                    $file2->move(public_path('movement'), $fileName2);
                }

                if($request->hasFile('last_document')) {
    
                    if($user_movement->last_document !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->last_document))) {
                            unlink(public_path('movement/'. $user_movement->last_document));
                        }
                    }
    
                    $file3 = $request->file('last_document');
                    $fileName3 = time().str_random(10).'.'.$file3->getClientOriginalExtension();
                    $file3->move(public_path('movement'), $fileName3);
                }
        
                $user_movement->update([
                    'diploma' => $request->hasFile('diploma') ? $fileName : $user_movement->diploma,
                    'authorization' => $request->hasFile('authorization') ? $fileName1 : $user_movement->authorization,
                    'image' => $request->hasFile('image') ? $fileName2 : $user_movement->image,
                    'last_document' => $request->hasFile('last_document') ? $fileName3 : $user_movement->last_document,
                ]);

            } elseif($admissionInfo->degree_needed == 'Master') {

                $this->validate($request, [
                    'bachelor' => 'mimes:jpg,jpeg,png',
                    'degree_transcript' => 'mimes:jpg,jpeg,png',
                    'authorization' => 'mimes:jpg,jpeg,png',
                    'image' => 'mimes:jpg,jpeg,png',
                    'last_document' => 'mimes:jpg,jpeg,png'
                ]);
        
                if($request->hasFile('bachelor')) {
    
                    if($user_movement->bachelor !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->bachelor))) {
                            unlink(public_path('movement/'. $user_movement->bachelor));
                        }
                    }
    
                    $file = $request->file('bachelor');
                    $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('movement'), $fileName);
    
                }

                if($request->hasFile('degree_transcript')) {
    
                    if($user_movement->degree_transcript !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->degree_transcript))) {
                            unlink(public_path('movement/'. $user_movement->degree_transcript));
                        }
                    }
    
                    $file1 = $request->file('degree_transcript');
                    $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
                    $file1->move(public_path('movement'), $fileName1);
    
                }
        
                if($request->hasFile('authorization')) {
    
                    if($user_movement->authorization !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->authorization))) {
                            unlink(public_path('movement/'. $user_movement->authorization));
                        }
                    }
    
                    $file2 = $request->file('authorization');
                    $fileName2 = time().str_random(20).'.'.$file2->getClientOriginalExtension();
                    $file2->move(public_path('movement'), $fileName2);
                }
        
                if($request->hasFile('image')) {
    
                    if($user_movement->image !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->image))) {
                            unlink(public_path('movement/'. $user_movement->image));
                        }
                    }
    
                    $file3 = $request->file('image');
                    $fileName3 = time().str_random(10).'.'.$file3->getClientOriginalExtension();
                    $file3->move(public_path('movement'), $fileName3);
                }

                if($request->hasFile('last_document')) {
    
                    if($user_movement->last_document !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->last_document))) {
                            unlink(public_path('movement/'. $user_movement->last_document));
                        }
                    }
    
                    $file4 = $request->file('last_document');
                    $fileName4 = time().str_random(10).'.'.$file4->getClientOriginalExtension();
                    $file4->move(public_path('movement'), $fileName4);
                }
        
                $user_movement->update([
                    'bachelor' => $request->hasFile('bachelor') ? $fileName : $user_movement->bachelor,
                    'degree_transcript' => $request->hasFile('degree_transcript') ? $fileName1 : $user_movement->degree_transcript,
                    'authorization' => $request->hasFile('authorization') ? $fileName2 : $user_movement->authorization,
                    'image' => $request->hasFile('image') ? $fileName3 : $user_movement->image,
                    'last_document' => $request->hasFile('last_document') ? $fileName4 : $user_movement->last_document,
                ]);

            } else {

                $this->validate($request, [
                    'master' => 'mimes:jpg,jpeg,png',
                    'authorization' => 'mimes:jpg,jpeg,png',
                    'image' => 'mimes:jpg,jpeg,png',
                    'last_document' => 'mimes:jpg,jpeg,png'
                ]);
        
                if($request->hasFile('master')) {
    
                    if($user_movement->master !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->master))) {
                            unlink(public_path('movement/'. $user_movement->master));
                        }
                    }
    
                    $file = $request->file('master');
                    $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('movement'), $fileName);
    
                }
        
                if($request->hasFile('authorization')) {
    
                    if($user_movement->authorization !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->authorization))) {
                            unlink(public_path('movement/'. $user_movement->authorization));
                        }
                    }
    
                    $file1 = $request->file('authorization');
                    $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
                    $file1->move(public_path('movement'), $fileName1);
                }
        
                if($request->hasFile('image')) {
    
                    if($user_movement->image !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->image))) {
                            unlink(public_path('movement/'. $user_movement->image));
                        }
                    }
    
                    $file2 = $request->file('image');
                    $fileName2 = time().str_random(10).'.'.$file2->getClientOriginalExtension();
                    $file2->move(public_path('movement'), $fileName2);
                }

                if($request->hasFile('last_document')) {
    
                    if($user_movement->last_document !== NULL) {
                        if (file_exists(public_path('movement/'. $user_movement->last_document))) {
                            unlink(public_path('movement/'. $user_movement->last_document));
                        }
                    }
    
                    $file3 = $request->file('last_document');
                    $fileName3 = time().str_random(10).'.'.$file3->getClientOriginalExtension();
                    $file3->move(public_path('movement'), $fileName3);
                }
        
                $user_movement->update([
                    'master' => $request->hasFile('master') ? $fileName : $user_movement->master,
                    'authorization' => $request->hasFile('authorization') ? $fileName1 : $user_movement->authorization,
                    'image' => $request->hasFile('image') ? $fileName2 : $user_movement->image,
                    'last_document' => $request->hasFile('last_document') ? $fileName3 : $user_movement->last_document,
                ]);

            }

    
            Session::flash('flash_class', 'alert alert-success');
            Session::flash('flash_message', 'Paper updated');
    
            return redirect()->route('show-movement-info');
    }

    public function submitFirstMoneyInfo(Request $request) {
        $admissionInfo = auth()->user()->user_admission_forms()->first();

        $this->validate($request, [
            'account_finance_first_image' => 'mimes:jpg,jpeg,png',
        ]);

        if($request->hasFile('account_finance_first_image')) {

            if($admissionInfo->account_finance_first_image !== NULL) {
                if (file_exists(public_path('movement/'. $admissionInfo->account_finance_first_image))) {
                    unlink(public_path('movement/'. $admissionInfo->account_finance_first_image));
                }
            }

            $file = $request->file('account_finance_first_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('movement'), $fileName);

        }

        $admissionInfo->update([
            'account_finance_first_image' => $request->hasFile('account_finance_first_image') ? $fileName : $admissionInfo->account_finance_first_image,
        ]);

        Session::flash('flash_class', 'alert alert-success');
        Session::flash('flash_message', 'First Money updated');

        return redirect()->route('show-movement-info');
    }

    public function submitSecondMoneyInfo(Request $request) {
        $admissionInfo = auth()->user()->user_admission_forms()->first();

        $this->validate($request, [
            'account_finance_second_image' => 'mimes:jpg,jpeg,png',
        ]);

        if($request->hasFile('account_finance_second_image')) {

            if($admissionInfo->account_finance_second_image !== NULL) {
                if (file_exists(public_path('movement/'. $admissionInfo->account_finance_second_image))) {
                    unlink(public_path('movement/'. $admissionInfo->account_finance_second_image));
                }
            }

            $file = $request->file('account_finance_second_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('movement'), $fileName);

        }

        $admissionInfo->update([
            'account_finance_second_image' => $request->hasFile('account_finance_second_image') ? $fileName : $admissionInfo->account_finance_second_image,
        ]);

        Session::flash('flash_class', 'alert alert-success');
        Session::flash('flash_message', 'Second Money updated');

        return redirect()->route('show-movement-info');
    }

    public function submitThirdMoneyInfo(Request $request) {
        $admissionInfo = auth()->user()->user_admission_forms()->first();

        $this->validate($request, [
            'account_finance_third_image' => 'mimes:jpg,jpeg,png',
        ]);

        if($request->hasFile('account_finance_third_image')) {

            if($admissionInfo->account_finance_third_image !== NULL) {
                if (file_exists(public_path('movement/'. $admissionInfo->account_finance_third_image))) {
                    unlink(public_path('movement/'. $admissionInfo->account_finance_third_image));
                }
            }

            $file = $request->file('account_finance_third_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('movement'), $fileName);

        }

        $admissionInfo->update([
            'account_finance_third_image' => $request->hasFile('account_finance_third_image') ? $fileName : $admissionInfo->account_finance_third_image,
        ]);

        Session::flash('flash_class', 'alert alert-success');
        Session::flash('flash_message', 'Third Money updated');

        return redirect()->route('show-movement-info');
    }

    public function submitFourthMoneyInfo(Request $request) {
        $admissionInfo = auth()->user()->user_admission_forms()->first();

        $this->validate($request, [
            'account_finance_fourth_image' => 'mimes:jpg,jpeg,png',
        ]);

        if($request->hasFile('account_finance_fourth_image')) {

            if($admissionInfo->account_finance_fourth_image !== NULL) {
                if (file_exists(public_path('movement/'. $admissionInfo->account_finance_fourth_image))) {
                    unlink(public_path('movement/'. $admissionInfo->account_finance_fourth_image));
                }
            }

            $file = $request->file('account_finance_fourth_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('movement'), $fileName);

        }

        $admissionInfo->update([
            'account_finance_fourth_image' => $request->hasFile('account_finance_fourth_image') ? $fileName : $admissionInfo->account_finance_fourth_image,
        ]);

        Session::flash('flash_class', 'alert alert-success');
        Session::flash('flash_message', 'Fourth Money updated');

        return redirect()->route('show-movement-info');
    }

    public function submitGoogleFormInfo(Request $request) {
        $password = $this->generateRandomString();

        if($request->degree_needed == 'Bachelor') {
            $this->validate($request, [
                'email' => 'required|email',
                'phone' => 'required|digits:11',
                'degree_needed' => 'required',
                'full_name' => 'required',
                'birthdate' => 'required',
                'nationality' => 'required',
                'nation' => 'required',
                'area' => 'required',
                'school_degree_name' => 'required',
                'school_degree_year' => 'required',
                'school_degree_country' => 'required',
                'percentage' => 'required',
                'education_system' => 'required',
                'admission_destination_id' => 'required|integer',
                'admission_university_id' => 'required|integer',
                'admission_fac_uni_id' => 'required|integer',
                'admission_fac_uni_major_id' => 'required|integer',
            ]);
        } elseif($request->degree_needed == 'Master') {
            $this->validate($request, [
                'email' => 'required|email',
                'phone' => 'required|digits:11',
                'degree_needed' => 'required',
                'full_name' => 'required',
                'birthdate' => 'required',
                'nationality' => 'required',
                'nation' => 'required',
                'area' => 'required',
                'bachelor_degree_name' => 'required',
                'bachelor_degree_year' => 'required',
                'bachelor_degree_country' => 'required',
                'bachelor_university_name' => 'required',
                'bachelor_faculty_name' => 'required',
                'bachelor_gpa_precentage' => 'required',
                'bachelor_education_system' => 'required',
                'admission_destination_id' => 'required|integer',
                'admission_university_id' => 'required|integer',
                'admission_fac_uni_id' => 'required|integer',
                'admission_fac_uni_major_id' => 'required|integer',
            ]);
        } else {
            $this->validate($request, [
                'email' => 'required|email',
                'phone' => 'required|digits:11',
                'degree_needed' => 'required',
                'full_name' => 'required',
                'birthdate' => 'required',
                'nationality' => 'required',
                'nation' => 'required',
                'area' => 'required',
                'master_degree_name' => 'required',
                'master_degree_year' => 'required',
                'master_degree_country' => 'required',
                'master_university_name' => 'required',
                'master_faculty_name' => 'required',
                'master_name' => 'required',
                'master_gpa_precentage' => 'required',
                'admission_destination_id' => 'required|integer',
                'admission_university_id' => 'required|integer',
                'admission_fac_uni_id' => 'required|integer',
                'admission_fac_uni_major_id' => 'required|integer',
            ]);
        }

        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree_needed' => $request->degree_needed,
            'password' => Hash::make($password),
            'source' => 'جوجل'
        ]);

        $user->personal_info()->create([
            'full_name' => $request->full_name,
            'birthdate' => $request->birthdate,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed
        ]);

        if($request->degree_needed == 'Bachelor') {
            $user->academic_info()->create([
                'degree_name' => $request->school_degree_name,
                'degree_year' => $request->school_degree_year,
                'degree_country' => $request->school_degree_country,
                'gpa_precentage' => $request->percentage,
                'education_system' => $request->education_system,
            ]);
        } elseif($request->degree_needed == 'Master') {
            $user->academic_info()->create([
                'degree_name' => $request->bachelor_degree_name,
                'degree_year' => $request->bachelor_degree_year,
                'degree_country' => $request->bachelor_degree_country,
                'university_name' => $request->bachelor_university_name,
                'faculty_name' => $request->bachelor_faculty_name,
                'gpa_precentage' => $request->bachelor_gpa_precentage,
                'education_system' => $request->bachelor_education_system,
            ]);
        } else {
            $user->academic_info()->create([
                'degree_name' => $request->master_degree_name,
                'degree_year' => $request->master_degree_year,
                'degree_country' => $request->master_degree_country,
                'university_name' => $request->master_university_name,
                'faculty_name' => $request->master_faculty_name,
                'master_name' => $request->master_name,
                'gpa_precentage' => $request->master_gpa_precentage,
            ]);
        }

        $destination = Destination::findorFail($request->admission_destination_id);
        $university = University::findorFail($request->admission_university_id);
        $facUniId = FacultyUniversity::findorFail($request->admission_fac_uni_id);
        $faculty = Faculty::findorFail($facUniId->faculty_id);
        $facultyMajorUniversity = FacultyMajorUniversity::findorFail($request->admission_fac_uni_major_id);
        $major = Major::findorFail($facultyMajorUniversity->major_id);
        $department = Department::findorFail($request->admission_department_id);

        $user->user_admission_forms()->create([
            'destination' => $destination->en_name,
            'university' => $university->en_name,
            'faculty' => $faculty->en_name,
            'major' => $major->en_name,
            'department' => $department->en_name,
            'degree_needed' => $request->degree_needed,
            'day' => Carbon::now()->format('d'),
            'month' => Carbon::now()->format('F'),
            'year' => Carbon::now()->format('Y'),
        ]);

        return redirect()->route('home')->with('user_submitted_email', $user->email)->with('user_submitted_password', $password);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
