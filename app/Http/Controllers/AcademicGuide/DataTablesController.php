<?php

namespace App\Http\Controllers\AcademicGuide;

use App\User;
use DataTables;
use Carbon\Carbon;
use App\University;
use App\Destination;
use App\FileMovement;
use App\UserAcademic;
use App\AdmissionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DataTablesController extends Controller
{

    public function adsListView() {
        return view('academic_guide.datatables.list.list_ads_datatables');
    }

    public function adsListData() {
        $model = User::select('users.*')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->listAdmissionForm();
        })->where('users.role', 'user')->where('users.source', 'google');

        return DataTables::of($model)
                ->addColumn('personal_info_birthdate', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['birthdate'];
                })
                ->addColumn('personal_info_gender', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['gender'];
                })
                ->addColumn('personal_info_nationality', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nationality'];
                })
                ->addColumn('personal_info_nation', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nation'];
                })
                ->addColumn('personal_info_address', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['address'];
                })
                ->addColumn('personal_info_area', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['area'];
                })
                ->addColumn('personal_info_degree_needed', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['degree_needed'];
                })
                ->addColumn('academic_info_degree_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_name'];
                })
                ->addColumn('academic_info_degree_year', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_year'];
                })
                ->addColumn('academic_info_degree_country', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_country'];
                })
                ->addColumn('academic_info_school_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['school_name'];
                })
                ->addColumn('academic_info_university_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['university_name'];
                })
                ->addColumn('academic_info_faculty_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['faculty_name'];
                })
                ->addColumn('academic_info_department_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['department_name'];
                })
                ->addColumn('academic_info_gpa_precentage', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['gpa_precentage'];
                })
                ->addColumn('academic_info_education_system', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['education_system'];
                })
                ->toJson();
    }

    public function socialMediaListView() {
        return view('academic_guide.datatables.list.list_social_media_datatables');
    }

    public function socialMediaListData() {
        $model = User::select('users.*')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->listAdmissionForm();
        })->where('users.role', 'user')->where('users.source', 'whatsapp');

        return DataTables::of($model)
                ->addColumn('personal_info_birthdate', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['birthdate'];
                })
                ->addColumn('personal_info_gender', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['gender'];
                })
                ->addColumn('personal_info_nationality', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nationality'];
                })
                ->addColumn('personal_info_nation', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nation'];
                })
                ->addColumn('personal_info_address', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['address'];
                })
                ->addColumn('personal_info_area', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['area'];
                })
                ->addColumn('personal_info_degree_needed', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['degree_needed'];
                })
                ->addColumn('academic_info_degree_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_name'];
                })
                ->addColumn('academic_info_degree_year', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_year'];
                })
                ->addColumn('academic_info_degree_country', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_country'];
                })
                ->addColumn('academic_info_school_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['school_name'];
                })
                ->addColumn('academic_info_university_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['university_name'];
                })
                ->addColumn('academic_info_faculty_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['faculty_name'];
                })
                ->addColumn('academic_info_department_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['department_name'];
                })
                ->addColumn('academic_info_gpa_precentage', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['gpa_precentage'];
                })
                ->addColumn('academic_info_education_system', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['education_system'];
                })
                ->toJson();
    }

    public function listView() {
        return view('academic_guide.datatables.list.list_datatables');
    }

    public function listData() {
        $model = User::select('users.*')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->listAdmissionForm();
        })->where('users.role', 'user');

        return DataTables::of($model)
                ->addColumn('personal_info_birthdate', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['birthdate'];
                })
                ->addColumn('personal_info_gender', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['gender'];
                })
                ->addColumn('personal_info_nationality', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nationality'];
                })
                ->addColumn('personal_info_nation', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nation'];
                })
                ->addColumn('personal_info_address', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['address'];
                })
                ->addColumn('personal_info_area', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['area'];
                })
                ->addColumn('personal_info_degree_needed', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['degree_needed'];
                })
                ->addColumn('academic_info_degree_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_name'];
                })
                ->addColumn('academic_info_degree_year', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_year'];
                })
                ->addColumn('academic_info_degree_country', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_country'];
                })
                ->addColumn('academic_info_school_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['school_name'];
                })
                ->addColumn('academic_info_university_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['university_name'];
                })
                ->addColumn('academic_info_faculty_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['faculty_name'];
                })
                ->addColumn('academic_info_department_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['department_name'];
                })
                ->addColumn('academic_info_gpa_precentage', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['gpa_precentage'];
                })
                ->addColumn('academic_info_education_system', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['education_system'];
                })
                ->toJson();
    }

    public function registerView() {
        return view('academic_guide.datatables.register.register_datatables');
    }

    public function registerData() {
        $model = User::select('users.*')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->registerAdmissionForm();
        })->where('users.role', 'user');

        return DataTables::of($model)
                ->addColumn('personal_info_birthdate', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['birthdate'];
                })
                ->addColumn('personal_info_gender', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['gender'];
                })
                ->addColumn('personal_info_nationality', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nationality'];
                })
                ->addColumn('personal_info_nation', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nation'];
                })
                ->addColumn('personal_info_address', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['address'];
                })
                ->addColumn('personal_info_area', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['area'];
                })
                ->addColumn('personal_info_degree_needed', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['degree_needed'];
                })
                ->addColumn('academic_info_degree_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_name'];
                })
                ->addColumn('academic_info_degree_year', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_year'];
                })
                ->addColumn('academic_info_degree_country', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_country'];
                })
                ->addColumn('academic_info_school_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['school_name'];
                })
                ->addColumn('academic_info_university_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['university_name'];
                })
                ->addColumn('academic_info_faculty_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['faculty_name'];
                })
                ->addColumn('academic_info_department_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['department_name'];
                })
                ->addColumn('academic_info_gpa_precentage', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['gpa_precentage'];
                })
                ->addColumn('academic_info_education_system', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['education_system'];
                })
                ->toJson();
    }

    public function listReportsView() {
        return view('academic_guide.datatables.list.list_reports_datatables');
    }

    public function listReportsData() {
        if(request()->get('todate') != '') {

            $fromdate = request()->get('fromdate');
            $todate = request()->get('todate');

            $fromdate = Carbon::parse($fromdate);
            $fromday = $fromdate->format('d');
            $frommonth = $fromdate->format('F');
            $fromyear = $fromdate->format('Y');

            $todate = Carbon::parse($todate);
            $today = $todate->format('d');
            $tomonth = $todate->format('F');
            $toyear = $todate->format('Y');

            $model = User::join('user_academics', 'users.id', '=', 'user_academics.user_id')
                         ->join('admission_forms', 'users.id', '=', 'admission_forms.user_id')
                ->select([
                    'users.id',
                    'users.role',
                    DB::raw('count(admission_forms.id) as quantity'),
                    DB::raw('admission_forms.day as day'),
                    DB::raw('admission_forms.month as month'),
                    DB::raw('admission_forms.year as year'),
                    DB::raw('count(user_academics.school_name) as bachelor_quantity'),
                    DB::raw('count(user_academics.department_name) as master_quantity'), 
                    DB::raw('count(user_academics.master_name) as phd_quantity'),  
             ])
            ->where('admission_forms.registered', '0')
            ->where('users.role', 'user')
            ->whereBetween('day', [$fromday, $today])
            ->whereBetween('month', [$frommonth, $tomonth])
            ->whereBetween('year', [$fromyear, $toyear])
            ->where('admission_forms.academic_guide', auth()->user()->name)
            ->groupBy(['day', 'month', 'year']);
    
            return DataTables::eloquent($model)
            ->toJson();

        } elseif(request()->get('todate') == ''  && request()->get('fromdate') != '' ) {
            $fromdate = request()->get('fromdate');

            $fromdate = Carbon::parse($fromdate);
            $fromday = $fromdate->format('d');
            $frommonth = $fromdate->format('F');
            $fromyear = $fromdate->format('Y');

            $model = User::join('user_academics', 'users.id', '=', 'user_academics.user_id')
                         ->join('admission_forms', 'users.id', '=', 'admission_forms.user_id')
                ->select([
                    'users.id',
                    'users.role',
                    DB::raw('count(admission_forms.id) as quantity'),
                    DB::raw('admission_forms.day as day'),
                    DB::raw('admission_forms.month as month'),
                    DB::raw('admission_forms.year as year'),
                    DB::raw('count(user_academics.school_name) as bachelor_quantity'),
                    DB::raw('count(user_academics.department_name) as master_quantity'), 
                    DB::raw('count(user_academics.master_name) as phd_quantity'),  
             ])
            ->where('admission_forms.registered', '0')
            ->where('users.role', 'user')
            ->where('day', $fromday)
            ->where('month', $frommonth)
            ->where('year', $fromyear)
            ->where('admission_forms.academic_guide', auth()->user()->name)
            ->groupBy(['day', 'month', 'year']);
    
            return DataTables::eloquent($model)
            ->toJson();
        } else {
            $model = User::join('user_academics', 'users.id', '=', 'user_academics.user_id')
                         ->join('admission_forms', 'users.id', '=', 'admission_forms.user_id')
                ->select([
                    'users.id',
                    'users.role',
                    DB::raw('count(admission_forms.id) as quantity'),
                    DB::raw('admission_forms.day as day'),
                    DB::raw('admission_forms.month as month'),
                    DB::raw('admission_forms.year as year'),
                    DB::raw('count(user_academics.school_name) as bachelor_quantity'),
                    DB::raw('count(user_academics.department_name) as master_quantity'),
                    DB::raw('count(user_academics.master_name) as phd_quantity'),  
             ])
            ->where('admission_forms.registered', '0')
            ->where('users.role', 'user')
            ->where('admission_forms.academic_guide', auth()->user()->name)
            ->groupBy(['day', 'month', 'year']);
    
            return DataTables::eloquent($model)
            ->toJson();
        }
    }

    public function registerReportsView() {
        return view('academic_guide.datatables.register.register_reports_datatables');
    }

    public function registerReportsData() {
        if(request()->get('todate') != '') {

            $fromdate = request()->get('fromdate');
            $todate = request()->get('todate');

            $fromdate = Carbon::parse($fromdate);
            $fromday = $fromdate->format('d');
            $frommonth = $fromdate->format('F');
            $fromyear = $fromdate->format('Y');

            $todate = Carbon::parse($todate);
            $today = $todate->format('d');
            $tomonth = $todate->format('F');
            $toyear = $todate->format('Y');

            $model = User::join('user_academics', 'users.id', '=', 'user_academics.user_id')
                         ->join('admission_forms', 'users.id', '=', 'admission_forms.user_id')
                ->select([
                    'users.id',
                    'users.role',
                    DB::raw('count(admission_forms.id) as quantity'),
                    DB::raw('admission_forms.day as day'),
                    DB::raw('admission_forms.month as month'),
                    DB::raw('admission_forms.year as year'),
                    DB::raw('count(user_academics.school_name) as bachelor_quantity'),
                    DB::raw('count(user_academics.department_name) as master_quantity'), 
                    DB::raw('count(user_academics.master_name) as phd_quantity'),  
             ])
            ->where('admission_forms.registered', '1')
            ->where('users.role', 'user')
            ->whereBetween('day', [$fromday, $today])
            ->whereBetween('month', [$frommonth, $tomonth])
            ->whereBetween('year', [$fromyear, $toyear])
            ->where('admission_forms.academic_guide', auth()->user()->name)
            ->groupBy(['day', 'month', 'year']);
    
            return DataTables::eloquent($model)
            ->toJson();

        } elseif(request()->get('todate') == ''  && request()->get('fromdate') != '' ) {
            $fromdate = request()->get('fromdate');

            $fromdate = Carbon::parse($fromdate);
            $fromday = $fromdate->format('d');
            $frommonth = $fromdate->format('F');
            $fromyear = $fromdate->format('Y');

            $model = User::join('user_academics', 'users.id', '=', 'user_academics.user_id')
                         ->join('admission_forms', 'users.id', '=', 'admission_forms.user_id')
                ->select([
                    'users.id',
                    'users.role',
                    DB::raw('count(admission_forms.id) as quantity'),
                    DB::raw('admission_forms.day as day'),
                    DB::raw('admission_forms.month as month'),
                    DB::raw('admission_forms.year as year'),
                    DB::raw('count(user_academics.school_name) as bachelor_quantity'),
                    DB::raw('count(user_academics.department_name) as master_quantity'), 
                    DB::raw('count(user_academics.master_name) as phd_quantity'),   
             ])
            ->where('admission_forms.registered', '1')
            ->where('users.role', 'user')
            ->where('day', $fromday)
            ->where('month', $frommonth)
            ->where('year', $fromyear)
            ->where('admission_forms.academic_guide', auth()->user()->name)
            ->groupBy(['day', 'month', 'year']);
    
            return DataTables::eloquent($model)
            ->toJson();
        } else {
            $model = User::join('user_academics', 'users.id', '=', 'user_academics.user_id')
                         ->join('admission_forms', 'users.id', '=', 'admission_forms.user_id')
                ->select([
                    'users.id',
                    'users.role',
                    DB::raw('count(admission_forms.id) as quantity'),
                    DB::raw('admission_forms.day as day'),
                    DB::raw('admission_forms.month as month'),
                    DB::raw('admission_forms.year as year'),
                    DB::raw('count(user_academics.school_name) as bachelor_quantity'),
                    DB::raw('count(user_academics.department_name) as master_quantity'), 
                    DB::raw('count(user_academics.master_name) as phd_quantity'),   
             ])
            ->where('admission_forms.registered', '1')
            ->where('users.role', 'user')
            ->where('admission_forms.academic_guide', auth()->user()->name)
            ->groupBy(['day', 'month', 'year']);
    
            return DataTables::eloquent($model)
            ->toJson();
        }
    }

    public function listBachelorView() {
        return view('academic_guide.datatables.list.list_bachelor_datatables');
    }

    public function listBachelorData() {
        $model = User::select('users.*')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->listAdmissionForm();
        })->where('users.degree_needed', 'Bachelor')->where('users.role', 'user');

        return DataTables::of($model)
                ->addColumn('personal_info_birthdate', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['birthdate'];
                })
                ->addColumn('personal_info_gender', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['gender'];
                })
                ->addColumn('personal_info_nationality', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nationality'];
                })
                ->addColumn('personal_info_nation', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nation'];
                })
                ->addColumn('personal_info_address', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['address'];
                })
                ->addColumn('personal_info_area', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['area'];
                })
                ->addColumn('personal_info_degree_needed', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['degree_needed'];
                })
                ->addColumn('academic_info_degree_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_name'];
                })
                ->addColumn('academic_info_degree_year', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_year'];
                })
                ->addColumn('academic_info_degree_country', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_country'];
                })
                ->addColumn('academic_info_school_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['school_name'];
                })
                ->addColumn('academic_info_gpa_precentage', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['gpa_precentage'];
                })
                ->addColumn('academic_info_education_system', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['education_system'];
                })
                ->addColumn('admission_info_destination', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['destination'];
                })
                ->addColumn('admission_info_university', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['university'];
                })
                ->addColumn('admission_info_faculty', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['faculty'];
                })
                ->addColumn('admission_info_major', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['major'];
                })
                ->addColumn('admission_info_department', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['department'];
                })
                ->addColumn('admission_info_day', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['day'];
                })
                ->addColumn('admission_info_month', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['month'];
                })
                ->addColumn('admission_info_year', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['year'];
                })
                ->addColumn('admission_info_academic_guide', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['academic_guide'];
                })
                ->addColumn('admission_info_registered', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    if($userAdmissionInfo['registered'] == 0) {
                        return 'لم يتم التسجيل بعد';
                    } else {
                        return 'تم التسجيل';
                    }
                })
                ->addColumn('action', function (User $user) {
                    $button = ' <div class="d-flex justify-content-between">
                                    <button type="button" name="edit" id="'.$user->id.'" class="edit-list-bachelor btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                                    <button type="button" name="edit" id="'.$user->id.'" class="delete-list-bachelor btn btn-danger btn-icon rounded-circle btn-sm"><i class="material-icons">delete</i></button>
                                </div>';
                    return $button;
                })
                ->toJson();
    }

    public function getListBachelorDataUserStore(Request $request) {
        $password = $this->generateRandomString();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'phone' => $request->phone,
            'status' => $request->status,
            'calls' => $request->calls,
            'source' => $request->source,
            'comment' => $request->comment,
            'degree_needed' => $request->degree_needed,
        ]);

        $user->personal_info()->create([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $user->academic_info()->create([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'school_name' => $request->school_name,
            'gpa_precentage' => $request->gpa_precentage,
            'education_system' => $request->education_system,
        ]);

        $user->user_admission_forms()->create([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'academic_guide' => auth()->user()->name,
            'en_academic_guide' => auth()->user()->en_name,
            'registered' => $request->registered,
            'day' => Carbon::now()->format('d'),
            'month' => Carbon::now()->format('F'),
            'year' => Carbon::now()->format('Y'),
            'register_day' => $request->registered == 1 ? Carbon::now()->format('d') : null,
            'register_month' => $request->registered == 1 ? Carbon::now()->format('F') : null,
            'register_year' => $request->registered == 1 ? Carbon::now()->format('Y') : null,
        ]);

        return response()->json(['success' => 'User added successfully']);
    }

    public function listBachelorDataUserId($id) {
        $user = User::findorFail($id);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        return response()->json([
            'user' => $user,
            'userPersonalInfo' => $userPersonalInfo,
            'userAcademicInfo' => $userAcademicInfo,
            'userAdmissionInfo' => $userAdmissionInfo,
        ]);
    }

    public function listBachelorDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_list_bachelor);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'calls' => $request->calls,
            'source' => $request->source,
            'comment' => $request->comment,
            'degree_needed' => $request->degree_needed,
        ]);

        $userPersonalInfo->update([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $userAcademicInfo->update([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'school_name' => $request->school_name,
            'gpa_precentage' => $request->gpa_precentage,
            'education_system' => $request->education_system,
        ]);

        $userAdmissionInfo->update([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'registered' => $request->registered,
            'register_day' => $request->registered == 1 ? Carbon::now()->format('d') : null,
            'register_month' => $request->registered == 1 ? Carbon::now()->format('F') : null,
            'register_year' => $request->registered == 1 ? Carbon::now()->format('Y') : null,
        ]);

        return response()->json(['success' => 'User updated successfully']);
    }

    public function listBachelorDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->personal_info()->delete();
        $user->academic_info()->delete();
        $user->user_admission_forms()->first()->delete();
        if($user->file_movement()->first()) {
            $user->file_movement()->delete();
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function listMasterView() {
        return view('academic_guide.datatables.list.list_master_datatables');
    }

    public function listMasterData() {
        $model = User::select('users.*')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->listAdmissionForm();
        })->where('users.degree_needed', 'Master')->where('users.role', 'user');

        return DataTables::of($model)
                ->addColumn('personal_info_birthdate', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['birthdate'];
                })
                ->addColumn('personal_info_gender', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['gender'];
                })
                ->addColumn('personal_info_nationality', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nationality'];
                })
                ->addColumn('personal_info_nation', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nation'];
                })
                ->addColumn('personal_info_address', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['address'];
                })
                ->addColumn('personal_info_area', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['area'];
                })
                ->addColumn('personal_info_degree_needed', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['degree_needed'];
                })
                ->addColumn('academic_info_degree_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_name'];
                })
                ->addColumn('academic_info_degree_year', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_year'];
                })
                ->addColumn('academic_info_degree_country', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_country'];
                })
                ->addColumn('academic_info_university_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['university_name'];
                })
                ->addColumn('academic_info_faculty_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['faculty_name'];
                })
                ->addColumn('academic_info_department_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['department_name'];
                })
                ->addColumn('academic_info_gpa_precentage', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['gpa_precentage'];
                })
                ->addColumn('academic_info_education_system', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['education_system'];
                })
                ->addColumn('admission_info_destination', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['destination'];
                })
                ->addColumn('admission_info_university', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['university'];
                })
                ->addColumn('admission_info_faculty', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['faculty'];
                })
                ->addColumn('admission_info_major', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['major'];
                })
                ->addColumn('admission_info_department', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['department'];
                })
                ->addColumn('admission_info_day', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['day'];
                })
                ->addColumn('admission_info_month', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['month'];
                })
                ->addColumn('admission_info_year', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['year'];
                })
                ->addColumn('admission_info_academic_guide', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['academic_guide'];
                })
                ->addColumn('admission_info_registered', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    if($userAdmissionInfo['registered'] == 0) {
                        return 'لم يتم التسجيل بعد';
                    } else {
                        return 'تم التسجيل';
                    }
                })
                ->addColumn('action', function (User $user) {
                    $button =  '<div class="d-flex justify-content-between">
                                    <button type="button" name="edit" id="'.$user->id.'" class="edit-list-master btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                                    <button type="button" name="edit" id="'.$user->id.'" class="delete-list-master btn btn-danger btn-icon rounded-circle btn-sm "><i class="material-icons">delete</i></button>
                                </div>';
                    return $button;
                })
                ->toJson();
    }

    public function getListMasterDataUserStore(Request $request) {
        $password = $this->generateRandomString();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'phone' => $request->phone,
            'status' => $request->status,
            'calls' => $request->calls,
            'source' => $request->source,
            'comment' => $request->comment,
            'degree_needed' => $request->degree_needed,
        ]);

        $user->personal_info()->create([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $user->academic_info()->create([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'university_name' => $request->university_name,
            'faculty_name' => $request->faculty_name,
            'department_name' => $request->department_name,
            'gpa_precentage' => $request->gpa_precentage,
            'education_system' => $request->education_system,
        ]);

        $user->user_admission_forms()->create([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'academic_guide' => auth()->user()->name,
            'en_academic_guide' => auth()->user()->en_name,
            'registered' => $request->registered,
            'day' => Carbon::now()->format('d'),
            'month' => Carbon::now()->format('F'),
            'year' => Carbon::now()->format('Y'),
            'register_day' => $request->registered == 1 ? Carbon::now()->format('d') : null,
            'register_month' => $request->registered == 1 ? Carbon::now()->format('F') : null,
            'register_year' => $request->registered == 1 ? Carbon::now()->format('Y') : null,
        ]);

        return response()->json(['success' => 'User added successfully']);
    }

    public function listMasterDataUserId($id) {
        $user = User::findorFail($id);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        return response()->json([
            'user' => $user,
            'userPersonalInfo' => $userPersonalInfo,
            'userAcademicInfo' => $userAcademicInfo,
            'userAdmissionInfo' => $userAdmissionInfo,
        ]);
    }

    public function listMasterDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_list_master);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'calls' => $request->calls,
            'source' => $request->source,
            'comment' => $request->comment,
            'degree_needed' => $request->degree_needed,
        ]);

        $userPersonalInfo->update([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $userAcademicInfo->update([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'university_name' => $request->university_name,
            'faculty_name' => $request->faculty_name,
            'department_name' => $request->department_name,
            'gpa_precentage' => $request->gpa_precentage,
            'education_system' => $request->education_system,
        ]);

        $userAdmissionInfo->update([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'registered' => $request->registered,
            'register_day' => $request->registered == 1 ? Carbon::now()->format('d') : null,
            'register_month' => $request->registered == 1 ? Carbon::now()->format('F') : null,
            'register_year' => $request->registered == 1 ? Carbon::now()->format('Y') : null,
        ]);

        return response()->json(['success' => 'User updated successfully']);
    }

    public function listMasterDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->personal_info()->delete();
        $user->academic_info()->delete();
        $user->user_admission_forms()->first()->delete();
        if($user->file_movement()->first()) {
            $user->file_movement()->delete();
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function listPhdView() {
        return view('academic_guide.datatables.list.list_phd_datatables');
    }

    public function listPhdData() {
        $model = User::select('users.*')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->listAdmissionForm();
        })->where('users.degree_needed', 'PhD')->where('users.role', 'user');

        return DataTables::of($model)
                ->addColumn('personal_info_birthdate', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['birthdate'];
                })
                ->addColumn('personal_info_gender', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['gender'];
                })
                ->addColumn('personal_info_nationality', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nationality'];
                })
                ->addColumn('personal_info_nation', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['nation'];
                })
                ->addColumn('personal_info_address', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['address'];
                })
                ->addColumn('personal_info_area', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['area'];
                })
                ->addColumn('personal_info_degree_needed', function (User $user) {
                    $userPersonalInfo = $user->personal_info()->first();
                    return $userPersonalInfo['degree_needed'];
                })
                ->addColumn('academic_info_degree_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_name'];
                })
                ->addColumn('academic_info_degree_year', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_year'];
                })
                ->addColumn('academic_info_degree_country', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['degree_country'];
                })
                ->addColumn('academic_info_university_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['university_name'];
                })
                ->addColumn('academic_info_faculty_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['faculty_name'];
                })
                ->addColumn('academic_info_master_name', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['master_name'];
                })
                ->addColumn('academic_info_gpa_precentage', function (User $user) {
                    $userAcademicInfo = $user->academic_info()->first();
                    return $userAcademicInfo['gpa_precentage'];
                })
                ->addColumn('admission_info_destination', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['destination'];
                })
                ->addColumn('admission_info_university', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['university'];
                })
                ->addColumn('admission_info_faculty', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['faculty'];
                })
                ->addColumn('admission_info_major', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['major'];
                })
                ->addColumn('admission_info_department', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['department'];
                })
                ->addColumn('admission_info_day', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['day'];
                })
                ->addColumn('admission_info_month', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['month'];
                })
                ->addColumn('admission_info_year', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['year'];
                })
                ->addColumn('admission_info_academic_guide', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    return $userAdmissionInfo['academic_guide'];
                })
                ->addColumn('admission_info_registered', function (User $user) {
                    $userAdmissionInfo = $user->user_admission_forms()->first();
                    if($userAdmissionInfo['registered'] == 0) {
                        return 'لم يتم التسجيل بعد';
                    } else {
                        return 'تم التسجيل';
                    }
                })
                ->addColumn('action', function (User $user) {
                    $button =  '<div class="d-flex justify-content-between">
                                    <button type="button" name="edit" id="'.$user->id.'" class="edit-list-phd btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                                    <button type="button" name="edit" id="'.$user->id.'" class="delete-list-phd btn btn-danger btn-icon rounded-circle btn-sm "><i class="material-icons">delete</i></button>
                                </div>';
                    return $button;
                })
                ->toJson();
    }

    public function getListPhdDataUserStore(Request $request) {
        $password = $this->generateRandomString();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'phone' => $request->phone,
            'status' => $request->status,
            'calls' => $request->calls,
            'source' => $request->source,
            'comment' => $request->comment,
            'degree_needed' => $request->degree_needed,
        ]);

        $user->personal_info()->create([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $user->academic_info()->create([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'university_name' => $request->university_name,
            'faculty_name' => $request->faculty_name,
            'master_name' => $request->master_name,
            'gpa_precentage' => $request->gpa_precentage,
        ]);

        $user->user_admission_forms()->create([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'academic_guide' => auth()->user()->name,
            'en_academic_guide' => auth()->user()->en_name,
            'registered' => $request->registered,
            'day' => Carbon::now()->format('d'),
            'month' => Carbon::now()->format('F'),
            'year' => Carbon::now()->format('Y'),
            'register_day' => $request->registered == 1 ? Carbon::now()->format('d') : null,
            'register_month' => $request->registered == 1 ? Carbon::now()->format('F') : null,
            'register_year' => $request->registered == 1 ? Carbon::now()->format('Y') : null,
        ]);

        return response()->json(['success' => 'User added successfully']);
    }

    public function listPhdDataUserId($id) {
        $user = User::findorFail($id);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        return response()->json([
            'user' => $user,
            'userPersonalInfo' => $userPersonalInfo,
            'userAcademicInfo' => $userAcademicInfo,
            'userAdmissionInfo' => $userAdmissionInfo,
        ]);
    }

    public function listPhdDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_list_phd);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            'calls' => $request->calls,
            'source' => $request->source,
            'comment' => $request->comment,
            'degree_needed' => $request->degree_needed,
        ]);

        $userPersonalInfo->update([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $userAcademicInfo->update([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'university_name' => $request->university_name,
            'faculty_name' => $request->faculty_name,
            'master_name' => $request->master_name,
            'gpa_precentage' => $request->gpa_precentage,
            'education_system' => $request->education_system,
        ]);

        $userAdmissionInfo->update([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'registered' => $request->registered,
            'register_day' => $request->registered == 1 ? Carbon::now()->format('d') : null,
            'register_month' => $request->registered == 1 ? Carbon::now()->format('F') : null,
            'register_year' => $request->registered == 1 ? Carbon::now()->format('Y') : null,
        ]);

        return response()->json(['success' => 'User updated successfully']);
    }

    public function listPhdDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->personal_info()->delete();
        $user->academic_info()->delete();
        $user->user_admission_forms()->first()->delete();
        if($user->file_movement()->first()) {
            $user->file_movement()->delete();
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function registerBachelorView() {
        return view('academic_guide.datatables.register.register_bachelor_datatables');
    }

    public function registerBachelorData() {
        $model = User::select('users.id', 'users.name', 'users.email', 'users.phone')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->registerAdmissionForm();
        })->where('users.degree_needed', 'Bachelor')->where('users.role', 'user');

        return DataTables::of($model)
        ->addColumn('personal_info_birthdate', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['birthdate'];
        })
        ->addColumn('personal_info_gender', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['gender'];
        })
        ->addColumn('personal_info_nationality', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['nationality'];
        })
        ->addColumn('personal_info_nation', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['nation'];
        })
        ->addColumn('personal_info_address', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['address'];
        })
        ->addColumn('personal_info_area', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['area'];
        })
        ->addColumn('personal_info_degree_needed', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['degree_needed'];
        })
        ->addColumn('academic_info_degree_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_name'];
        })
        ->addColumn('academic_info_degree_year', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_year'];
        })
        ->addColumn('academic_info_degree_country', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_country'];
        })
        ->addColumn('academic_info_school_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['school_name'];
        })
        ->addColumn('academic_info_gpa_precentage', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['gpa_precentage'];
        })
        ->addColumn('academic_info_education_system', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['education_system'];
        })
        ->addColumn('admission_info_destination', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['destination'];
        })
        ->addColumn('admission_info_university', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['university'];
        })
        ->addColumn('admission_info_faculty', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['faculty'];
        })
        ->addColumn('admission_info_major', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['major'];
        })
        ->addColumn('admission_info_department', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['department'];
        })
        ->addColumn('admission_info_status_after_register', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['status_after_register'];
        })
        ->addColumn('admission_info_paper_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['paper_status'];
        })
        ->addColumn('admission_info_deal', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['deal'];
        })
        ->addColumn('admission_info_account_finance_first_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_first_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_first_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_first_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_first_number'];
        })
        ->addColumn('admission_info_account_finance_first_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_first_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_second_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_second_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_second_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_second_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_second_number'];
        })
        ->addColumn('admission_info_account_finance_second_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_second_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_third_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_third_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_third_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_third_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_third_number'];
        })
        ->addColumn('admission_info_account_finance_third_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_third_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_fourth_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_fourth_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_fourth_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_fourth_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_fourth_number'];
        })
        ->addColumn('admission_info_account_finance_fourth_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_fourth_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_accounts_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['accounts_status'];
        })
        ->addColumn('admission_info_correspondence', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['correspondence'];
        })
        ->addColumn('admission_info_day', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['day'];
        })
        ->addColumn('admission_info_month', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['month'];
        })
        ->addColumn('admission_info_year', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['year'];
        })
        ->addColumn('admission_info_registered_day', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_day'];
        })
        ->addColumn('admission_info_registered_month', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_month'];
        })
        ->addColumn('admission_info_registered_year', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_year'];
        })
        ->addColumn('admission_info_academic_guide', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['academic_guide'];
        })
        ->addColumn('admission_info_model_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['model_number'];
        })
        ->addColumn('action', function (User $user) {     
            $button = '<div class="d-flex justify-content-between">
                            <button type="button" name="edit" id="'.$user->id.'" class="edit-register-bachelor btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                            <button type="button" name="edit" id="'.$user->id.'" class="delete-register-bachelor btn btn-danger btn-icon rounded-circle btn-sm"><i class="material-icons">delete</i></button>
                        </div>';
            return $button;
        })->rawColumns([
            'admission_info_account_finance_first_image',
            'admission_info_account_finance_second_image',
            'admission_info_account_finance_third_image',
            'admission_info_account_finance_fourth_image', 
            'action'])->make(true);       
    }

    public function registerBachelorDataUserId($id) {
        $user = User::findorFail($id);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        return response()->json([
            'user' => $user,
            'userPersonalInfo' => $userPersonalInfo,
            'userAcademicInfo' => $userAcademicInfo,
            'userAdmissionInfo' => $userAdmissionInfo,
        ]);
    }

    public function registerBachelorDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_register_bachelor);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();
        $userFileMovement = $user->file_movement()->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree_needed' => $request->degree_needed,
        ]);

        $userPersonalInfo->update([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $userAcademicInfo->update([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'school_name' => $request->school_name,
            'gpa_precentage' => $request->gpa_precentage,
            'education_system' => $request->education_system,
        ]);

        $userAdmissionInfo->update([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'status_after_register' => $request->status_after_register,
            'paper_status' => $request->paper_status,
            'deal' => $request->deal,

            'account_finance_first_number' => $request->account_finance_first_number,
            'account_finance_first_status' => $request->account_finance_first_status,
            'account_finance_second_number' => $request->account_finance_second_number,
            'account_finance_second_status' => $request->account_finance_second_status,
            'account_finance_third_number' => $request->account_finance_third_number,
            'account_finance_third_status' => $request->account_finance_third_status,
            'account_finance_fourth_number' => $request->account_finance_fourth_number,
            'account_finance_fourth_status' => $request->account_finance_fourth_status,

            'accounts_status' => $request->accounts_status,
            'correspondence' => $request->correspondence,
            'model_number' => $request->model_number,
        ]);

        if($request->paper_status != '') {
            if(!isset($userFileMovement)) {
                FileMovement::create([
                    'day' => Carbon::now()->format('d'),
                    'month' => Carbon::now()->format('F'),
                    'year' => Carbon::now()->format('Y'),
                    'user_id' => $user->id
                ]);
            }
        }

        return response()->json(['success' => 'User updated successfully']);
    }

    public function registerBachelorDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->personal_info()->delete();
        $user->academic_info()->delete();
        $user->user_admission_forms()->first()->delete();
        if($user->file_movement()->first()) {
            $user->file_movement()->delete();
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function registerMasterView() {
        return view('academic_guide.datatables.register.register_master_datatables');
    }

    public function registerMasterData() {
        $model = User::select('users.id', 'users.name', 'users.email', 'users.phone')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->registerAdmissionForm();
        })->where('users.degree_needed', 'Master')->where('users.role', 'user');

        return DataTables::of($model)
        ->addColumn('personal_info_birthdate', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['birthdate'];
        })
        ->addColumn('personal_info_gender', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['gender'];
        })
        ->addColumn('personal_info_nationality', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['nationality'];
        })
        ->addColumn('personal_info_nation', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['nation'];
        })
        ->addColumn('personal_info_address', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['address'];
        })
        ->addColumn('personal_info_area', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['area'];
        })
        ->addColumn('personal_info_degree_needed', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['degree_needed'];
        })
        ->addColumn('academic_info_degree_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_name'];
        })
        ->addColumn('academic_info_degree_year', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_year'];
        })
        ->addColumn('academic_info_degree_country', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_country'];
        })
        ->addColumn('academic_info_university_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['university_name'];
        })
        ->addColumn('academic_info_faculty_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['faculty_name'];
        })
        ->addColumn('academic_info_department_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['department_name'];
        })
        ->addColumn('academic_info_gpa_precentage', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['gpa_precentage'];
        })
        ->addColumn('academic_info_education_system', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['education_system'];
        })
        ->addColumn('admission_info_destination', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['destination'];
        })
        ->addColumn('admission_info_university', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['university'];
        })
        ->addColumn('admission_info_faculty', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['faculty'];
        })
        ->addColumn('admission_info_major', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['major'];
        })
        ->addColumn('admission_info_department', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['department'];
        })
        ->addColumn('admission_info_status_after_register', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['status_after_register'];
        })
        ->addColumn('admission_info_paper_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['paper_status'];
        })
        ->addColumn('admission_info_deal', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['deal'];
        })
        ->addColumn('admission_info_account_finance_first_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_first_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_first_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_first_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_first_number'];
        })
        ->addColumn('admission_info_account_finance_first_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_first_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_second_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_second_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_second_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_second_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_second_number'];
        })
        ->addColumn('admission_info_account_finance_second_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_second_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_third_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_third_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_third_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_third_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_third_number'];
        })
        ->addColumn('admission_info_account_finance_third_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_third_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_fourth_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_fourth_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_fourth_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_fourth_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_fourth_number'];
        })
        ->addColumn('admission_info_account_finance_fourth_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_fourth_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_accounts_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['accounts_status'];
        })
        ->addColumn('admission_info_correspondence', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['correspondence'];
        })
        ->addColumn('admission_info_day', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['day'];
        })
        ->addColumn('admission_info_month', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['month'];
        })
        ->addColumn('admission_info_year', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['year'];
        })
        ->addColumn('admission_info_registered_day', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_day'];
        })
        ->addColumn('admission_info_registered_month', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_month'];
        })
        ->addColumn('admission_info_registered_year', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_year'];
        })
        ->addColumn('admission_info_academic_guide', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['academic_guide'];
        })
        ->addColumn('admission_info_model_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['model_number'];
        })
        ->addColumn('action', function (User $user) {
            $button = '<div class="d-flex justify-content-between">
                            <button type="button" name="edit" id="'.$user->id.'" class="edit-register-master btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                            <button type="button" name="edit" id="'.$user->id.'" class="delete-register-master btn btn-danger btn-icon rounded-circle btn-sm"><i class="material-icons">delete</i></button>
                        </div>';
            
                            return $button;
        })->rawColumns([
            'admission_info_account_finance_first_image',
            'admission_info_account_finance_second_image',
            'admission_info_account_finance_third_image',
            'admission_info_account_finance_fourth_image',
            'action'])->make(true);
}

    public function registerMasterDataUserId($id) {
        $user = User::findorFail($id);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        return response()->json([
            'user' => $user,
            'userPersonalInfo' => $userPersonalInfo,
            'userAcademicInfo' => $userAcademicInfo,
            'userAdmissionInfo' => $userAdmissionInfo,
        ]);
    }

    public function registerMasterDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_register_master);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();
        $userFileMovement = $user->file_movement()->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree_needed' => $request->degree_needed,
        ]);

        $userPersonalInfo->update([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $userAcademicInfo->update([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'university_name' => $request->university_name,
            'faculty_name' => $request->faculty_name,
            'department_name' => $request->department_name,
            'gpa_precentage' => $request->gpa_precentage,
            'education_system' => $request->education_system,
        ]);

        $userAdmissionInfo->update([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'status_after_register' => $request->status_after_register,
            'paper_status' => $request->paper_status,
            'deal' => $request->deal,

            'account_finance_first_number' => $request->account_finance_first_number,
            'account_finance_first_status' => $request->account_finance_first_status,
            'account_finance_second_number' => $request->account_finance_second_number,
            'account_finance_second_status' => $request->account_finance_second_status,
            'account_finance_third_number' => $request->account_finance_third_number,
            'account_finance_third_status' => $request->account_finance_third_status,
            'account_finance_fourth_number' => $request->account_finance_fourth_number,
            'account_finance_fourth_status' => $request->account_finance_fourth_status,


            'accounts_status' => $request->accounts_status,
            'correspondence' => $request->correspondence,
            'model_number' => $request->model_number,
        ]);

        if($request->paper_status != '') {
            if(!isset($userFileMovement)) {
                FileMovement::create([
                    'day' => Carbon::now()->format('d'),
                    'month' => Carbon::now()->format('F'),
                    'year' => Carbon::now()->format('Y'),
                    'user_id' => $user->id
                ]);
            }
        }

        return response()->json(['success' => 'User updated successfully']);
    }

    public function registerMasterDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->personal_info()->delete();
        $user->academic_info()->delete();
        $user->user_admission_forms()->first()->delete();
        if($user->file_movement()->first()) {
            $user->file_movement()->delete();
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function registerPhdView() {
        return view('academic_guide.datatables.register.register_phd_datatables');
    }

    public function registerPhdData() {
        $model = User::select('users.id', 'users.name', 'users.email', 'users.phone')->with('personal_info', 'academic_info', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->registerAdmissionForm();
        })->where('users.degree_needed', 'PhD')->where('users.role', 'user');

        return DataTables::of($model)
        ->addColumn('personal_info_birthdate', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['birthdate'];
        })
        ->addColumn('personal_info_gender', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['gender'];
        })
        ->addColumn('personal_info_nationality', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['nationality'];
        })
        ->addColumn('personal_info_nation', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['nation'];
        })
        ->addColumn('personal_info_address', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['address'];
        })
        ->addColumn('personal_info_area', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['area'];
        })
        ->addColumn('personal_info_degree_needed', function (User $user) {
            $userPersonalInfo = $user->personal_info()->first();
            return $userPersonalInfo['degree_needed'];
        })
        ->addColumn('academic_info_degree_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_name'];
        })
        ->addColumn('academic_info_degree_year', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_year'];
        })
        ->addColumn('academic_info_degree_country', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['degree_country'];
        })
        ->addColumn('academic_info_university_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['university_name'];
        })
        ->addColumn('academic_info_faculty_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['faculty_name'];
        })
        ->addColumn('academic_info_master_name', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['master_name'];
        })
        ->addColumn('academic_info_gpa_precentage', function (User $user) {
            $userAcademicInfo = $user->academic_info()->first();
            return $userAcademicInfo['gpa_precentage'];
        })
        ->addColumn('admission_info_destination', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['destination'];
        })
        ->addColumn('admission_info_university', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['university'];
        })
        ->addColumn('admission_info_faculty', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['faculty'];
        })
        ->addColumn('admission_info_major', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['major'];
        })
        ->addColumn('admission_info_department', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['department'];
        })
        ->addColumn('admission_info_status_after_register', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['status_after_register'];
        })
        ->addColumn('admission_info_paper_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['paper_status'];
        })
        ->addColumn('admission_info_deal', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['deal'];
        })
        ->addColumn('admission_info_account_finance_first_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_first_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_first_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_first_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_first_number'];
        })
        ->addColumn('admission_info_account_finance_first_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_first_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_second_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_second_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_second_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_second_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_second_number'];
        })
        ->addColumn('admission_info_account_finance_second_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_second_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_third_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_third_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_third_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_third_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_third_number'];
        })
        ->addColumn('admission_info_account_finance_third_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_third_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_account_finance_fourth_image', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_fourth_image'] != null) {
                $url = asset('movement/' . $userAdmissionInfo['account_finance_fourth_image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('admission_info_account_finance_fourth_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['account_finance_fourth_number'];
        })
        ->addColumn('admission_info_account_finance_fourth_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            if($userAdmissionInfo['account_finance_fourth_status'] == 0) {
                return 'لم يتم القبول بعد';
            } else {
                return 'تم القبول';
            }
        })
        ->addColumn('admission_info_accounts_status', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['accounts_status'];
        })
        ->addColumn('admission_info_correspondence', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['correspondence'];
        })
        ->addColumn('admission_info_day', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['day'];
        })
        ->addColumn('admission_info_month', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['month'];
        })
        ->addColumn('admission_info_year', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['year'];
        })
        ->addColumn('admission_info_registered_day', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_day'];
        })
        ->addColumn('admission_info_registered_month', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_month'];
        })
        ->addColumn('admission_info_registered_year', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['register_year'];
        })
        ->addColumn('admission_info_academic_guide', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['academic_guide'];
        })
        ->addColumn('admission_info_model_number', function (User $user) {
            $userAdmissionInfo = $user->user_admission_forms()->first();
            return $userAdmissionInfo['model_number'];
        })
        ->addColumn('action', function (User $user) {
            $button = '<div class="d-flex justify-content-between">
                            <button type="button" name="edit" id="'.$user->id.'" class="edit-register-phd btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                            <button type="button" name="edit" id="'.$user->id.'" class="delete-register-phd btn btn-danger btn-icon rounded-circle btn-sm"><i class="material-icons">delete</i></button>
                        </div>';
            
                            return $button;
        })->rawColumns([
            'admission_info_account_finance_first_image', 
            'admission_info_account_finance_second_image', 
            'admission_info_account_finance_third_image', 
            'admission_info_account_finance_fourth_image',
            'action'])->make(true);
    }

    public function registerPhdDataUserId($id) {
        $user = User::findorFail($id);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();

        return response()->json([
            'user' => $user,
            'userPersonalInfo' => $userPersonalInfo,
            'userAcademicInfo' => $userAcademicInfo,
            'userAdmissionInfo' => $userAdmissionInfo,
        ]);
    }

    public function registerPhdDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_register_phd);
        $userPersonalInfo = $user->personal_info()->first();
        $userAcademicInfo = $user->academic_info()->first();
        $userAdmissionInfo = $user->user_admission_forms()->first();
        $userFileMovement = $user->file_movement()->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree_needed' => $request->degree_needed,
        ]);

        $userPersonalInfo->update([
            'full_name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'nation' => $request->nation,
            'address' => $request->address,
            'area' => $request->area,
            'degree_needed' => $request->degree_needed,
        ]);

        $userAcademicInfo->update([
            'degree_name' => $request->degree_name,
            'degree_year' => $request->degree_year,
            'degree_country' => $request->degree_country,
            'university_name' => $request->university_name,
            'faculty_name' => $request->faculty_name,
            'master_name' => $request->master_name,
            'gpa_precentage' => $request->gpa_precentage,
        ]);

        $userAdmissionInfo->update([
            'destination' => $request->destination,
            'university' => $request->university,
            'faculty' => $request->faculty,
            'major' => $request->major,
            'department' => $request->department,
            'degree_needed' => $request->degree_needed,
            'status_after_register' => $request->status_after_register,
            'paper_status' => $request->paper_status,
            'deal' => $request->deal,

            'account_finance_first_number' => $request->account_finance_first_number,
            'account_finance_first_status' => $request->account_finance_first_status,
            'account_finance_second_number' => $request->account_finance_second_number,
            'account_finance_second_status' => $request->account_finance_second_status,
            'account_finance_third_number' => $request->account_finance_third_number,
            'account_finance_third_status' => $request->account_finance_third_status,
            'account_finance_fourth_number' => $request->account_finance_fourth_number,
            'account_finance_fourth_status' => $request->account_finance_fourth_status,

            'accounts_status' => $request->accounts_status,
            'correspondence' => $request->correspondence,
            'model_number' => $request->model_number,
        ]);

        if($request->paper_status != '') {
            if(!isset($userFileMovement)) {
                FileMovement::create([
                    'day' => Carbon::now()->format('d'),
                    'month' => Carbon::now()->format('F'),
                    'year' => Carbon::now()->format('Y'),
                    'user_id' => $user->id
                ]);
            }
        }

        return response()->json(['success' => 'User updated successfully']);
    }

    public function registerPhdDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->personal_info()->delete();
        $user->academic_info()->delete();
        $user->user_admission_forms()->first()->delete();
        if($user->file_movement()->first()) {
            $user->file_movement()->delete();
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function movementBachelorView() {
        return view('academic_guide.datatables.movement.movement_bachelor_datatables');
    }

    public function movementBachelorData() {
        $model = User::select('users.id', 'users.degree_needed')->with('file_movement' , 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->movementAdmissionForm();
        })->where('users.degree_needed', 'Bachelor')->where('users.role', 'user');

        return DataTables::of($model)
        ->addColumn('file_movement_passport', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['passport'] != NULL) {
                $url = asset('movement/' . $userPersonalInfo['passport']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('file_movement_passport_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['passport_status'] == 0) {
                $userPersonalInfo['passport_status'] = 'لم يتم القبول بعد';
                return $userPersonalInfo['passport_status'];
            } else {
                $userPersonalInfo['passport_status'] = ' تم القبول';
                return $userPersonalInfo['passport_status'];
            }
        })
        ->addColumn('file_movement_secondary_certificate', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['secondary_certificate'] != NULL) {
                $url = asset('movement/' . $userPersonalInfo['secondary_certificate']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('file_movement_secondary_certificate_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['secondary_certificate_status'] == 0)
            {
                $userPersonalInfo['secondary_certificate_status'] = 'لم يتم القبول بعد';
                return $userPersonalInfo['secondary_certificate_status'];
            } else {
                $userPersonalInfo['secondary_certificate_status'] = ' تم القبول ';
                return $userPersonalInfo['secondary_certificate_status'];
            }
        })
        ->addColumn('file_movement_birth_certificate', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['birth_certificate'] != NULL) {
                $url = asset('movement/' . $userPersonalInfo['birth_certificate']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('file_movement_birth_certificate_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['birth_certificate_status'] == 0)
            {
                $userPersonalInfo['birth_certificate_status'] = 'لم يتم القبول بعد';
                return $userPersonalInfo['birth_certificate_status'];
            } else {
                $userPersonalInfo['birth_certificate_status'] = ' تم القبول ';
                return $userPersonalInfo['birth_certificate_status'];
            }
        })
        ->addColumn('file_movement_diploma', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['diploma'] != NULL) {
                $url = asset('movement/' . $userPersonalInfo['diploma']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('file_movement_diploma_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['diploma_status'] == 0)
            {
                $userPersonalInfo['diploma_status'] = 'لم يتم القبول بعد';
                return $userPersonalInfo['diploma_status'];
            } else {
                $userPersonalInfo['diploma_status'] = ' تم القبول ';
                return $userPersonalInfo['diploma_status'];
            }
        })
        ->addColumn('file_movement_authorization', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['authorization'] != NULL) {
                $url = asset('movement/' . $userPersonalInfo['authorization']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('file_movement_authorization_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['authorization_status'] == 0)
            {
                $userPersonalInfo['authorization_status'] = 'لم يتم القبول بعد';
                return $userPersonalInfo['authorization_status'];
            } else {
                $userPersonalInfo['authorization_status'] = ' تم القبول ';
                return $userPersonalInfo['authorization_status'];
            }
        })
        ->addColumn('file_movement_image', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['image'] != NULL) {
                $url = asset('movement/' . $userPersonalInfo['image']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('file_movement_image_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['image_status'] == 0)
            {
                $userPersonalInfo['image_status'] = 'لم يتم القبول بعد';
                return $userPersonalInfo['image_status'];
            } else {
                $userPersonalInfo['image_status'] = ' تم القبول ';
                return $userPersonalInfo['image_status'];
            }
        })
        ->addColumn('file_movement_last_document', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['last_document'] != NULL) {
                $url = asset('movement/' . $userPersonalInfo['last_document']);
                return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
            } else {
                return 'لم يرسل صورة حتي الان';
            }
        })
        ->addColumn('file_movement_last_document_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            if($userPersonalInfo['last_document_status'] == 0)
            {
                $userPersonalInfo['last_document_status'] = 'لم يتم القبول بعد';
                return $userPersonalInfo['last_document_status'];
            } else {
                $userPersonalInfo['last_document_status'] = ' تم القبول ';
                return $userPersonalInfo['last_document_status'];
            }
        })
        ->addColumn('file_movement_capabilities', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['capabilities'];
        })
        ->addColumn('file_movement_other', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['other'];
        })
        ->addColumn('file_movement_day', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['day'];
        })
        ->addColumn('file_movement_month', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['month'];
        })
        ->addColumn('file_movement_year', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['year'];
        })
        ->addColumn('file_movement_delegate_day', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['delegate_day'];
        })
        ->addColumn('file_movement_delegate_month', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['delegate_month'];
        })
        ->addColumn('file_movement_delegate_year', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['delegate_year'];
        })
        ->addColumn('file_movement_steps', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['steps'];
        })
        ->addColumn('file_movement_delegate_status', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['delegate_status'];
        })
        ->addColumn('file_movement_comment', function (User $user) {
            $userPersonalInfo = $user->file_movement()->first();
            return $userPersonalInfo['comment'];
        })
        ->addColumn('action', function (User $user) {
            $button = '<div class="d-flex justify-content-between">
                            <button type="button" name="edit" id="'.$user->id.'" class="edit-movement-bachelor btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                            <button type="button" name="edit" id="'.$user->id.'" class="delete-movement-bachelor btn btn-danger btn-icon rounded-circle btn-sm"><i class="material-icons">delete</i></button>
                        </div>';
            return $button;
        })->rawColumns(['file_movement_passport', 'file_movement_secondary_certificate', 'file_movement_birth_certificate', 'file_movement_diploma', 'file_movement_authorization', 'file_movement_image', 'file_movement_last_document', 'action'])->make(true);
    }

    public function movementBachelorDataUserId($id) {
        $user = User::findorFail($id);
        $userMovementFiles = $user->file_movement()->first();

        return response()->json([
            'user' => $user,
            'userMovementFiles' => $userMovementFiles,
        ]);
    }

    public function movementBachelorDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_movement_bachelor);
        $userMovementFiles = $user->file_movement()->first();

        $userMovementFiles->update([
            'passport_status' => $request->passport_status,
            'secondary_certificate_status' => $request->secondary_certificate_status,
            'birth_certificate_status' => $request->birth_certificate_status,
            'diploma_status' => $request->diploma_status,
            'authorization_status' => $request->authorization_status,
            'image_status' => $request->image_status,
            'last_document_status' => $request->last_document_status,
            'capabilities' => $request->capabilities,
            'other' => $request->other,
            'delegate_day' => $request->delegate_day != null ? $request->delegate_day : null,
            'delegate_month' => $request->delegate_month != null ? $request->delegate_month : null,
            'delegate_year' => $request->delegate_year != null ? $request->delegate_year : null,
            'steps' => $request->steps,
            'delegate_status' => $request->delegate_status,
            'comment' => $request->comment,
        ]);

        return response()->json(['success' => 'User updated successfully']);
    }

    public function movementBachelorDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->file_movement()->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function movementMasterView() {
        return view('academic_guide.datatables.movement.movement_master_datatables');
    }

    public function movementMasterData() {
        $model = User::select('users.id', 'users.degree_needed')->with('file_movement', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->movementAdmissionForm();
        })->where('users.degree_needed', 'Master')->where('users.role', 'user');

        return DataTables::of($model)
                ->addColumn('file_movement_passport', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['passport'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['passport']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_passport_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['passport_status'] == 0)
                    {
                        $userPersonalInfo['passport_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['passport_status'];
                    } else {
                        $userPersonalInfo['passport_status'] = ' تم القبول ';
                        return $userPersonalInfo['passport_status'];
                    }
                })
                ->addColumn('file_movement_secondary_certificate', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['secondary_certificate'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['secondary_certificate']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_secondary_certificate_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['secondary_certificate_status'] == 0)
                    {
                        $userPersonalInfo['secondary_certificate_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['secondary_certificate_status'];
                    } else {
                        $userPersonalInfo['secondary_certificate_status'] = ' تم القبول ';
                        return $userPersonalInfo['secondary_certificate_status'];
                    }
                })
                ->addColumn('file_movement_birth_certificate', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['birth_certificate'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['birth_certificate']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_birth_certificate_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['birth_certificate_status'] == 0)
                    {
                        $userPersonalInfo['birth_certificate_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['birth_certificate_status'];
                    } else {
                        $userPersonalInfo['birth_certificate_status'] = ' تم القبول ';
                        return $userPersonalInfo['birth_certificate_status'];
                    }
                })
                ->addColumn('file_movement_bachelor', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['bachelor'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['bachelor']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_bachelor_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['bachelor_status'] == 0)
                    {
                        $userPersonalInfo['bachelor_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['bachelor_status'];
                    } else {
                        $userPersonalInfo['bachelor_status'] = ' تم القبول ';
                        return $userPersonalInfo['bachelor_status'];
                    }
                })
                ->addColumn('file_movement_degree_transcript', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['degree_transcript'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['degree_transcript']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_degree_transcript_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['degree_transcript_status'] == 0)
                    {
                        $userPersonalInfo['degree_transcript_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['degree_transcript_status'];
                    } else {
                        $userPersonalInfo['degree_transcript_status'] = ' تم القبول ';
                        return $userPersonalInfo['degree_transcript_status'];
                    }
                })
                ->addColumn('file_movement_authorization', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['authorization'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['authorization']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_authorization_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['authorization_status'] == 0)
                    {
                        $userPersonalInfo['authorization_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['authorization_status'];
                    } else {
                        $userPersonalInfo['authorization_status'] = ' تم القبول ';
                        return $userPersonalInfo['authorization_status'];
                    }
                })
                ->addColumn('file_movement_image', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['image'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['image']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_image_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['image_status'] == 0)
                    {
                        $userPersonalInfo['image_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['image_status'];
                    } else {
                        $userPersonalInfo['image_status'] = ' تم القبول ';
                        return $userPersonalInfo['image_status'];
                    }
                })
                ->addColumn('file_movement_last_document', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['last_document'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['last_document']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_last_document_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['last_document_status'] == 0)
                    {
                        $userPersonalInfo['last_document_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['last_document_status'];
                    } else {
                        $userPersonalInfo['last_document_status'] = ' تم القبول ';
                        return $userPersonalInfo['last_document_status'];
                    }
                })
                ->addColumn('file_movement_capabilities', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['capabilities'];
                })
                ->addColumn('file_movement_other', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['other'];
                })
                ->addColumn('file_movement_day', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['day'];
                })
                ->addColumn('file_movement_month', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['month'];
                })
                ->addColumn('file_movement_year', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['year'];
                })
                ->addColumn('file_movement_delegate_day', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_day'];
                })
                ->addColumn('file_movement_delegate_month', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_month'];
                })
                ->addColumn('file_movement_delegate_year', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_year'];
                })
                ->addColumn('file_movement_steps', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['steps'];
                })
                ->addColumn('file_movement_delegate_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_status'];
                })
                ->addColumn('file_movement_equation_date', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['equation_date'];
                })
                ->addColumn('file_movement_egypt_arrival', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['egypt_arrival'];
                })
                ->addColumn('file_movement_comment', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['comment'];
                })
                ->addColumn('action', function (User $user) {
                    $button = '<div class="d-flex justify-content-between">
                                    <button type="button" name="edit" id="'.$user->id.'" class="edit-movement-master btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                                    <button type="button" name="edit" id="'.$user->id.'" class="delete-movement-master btn btn-danger btn-icon rounded-circle btn-sm"><i class="material-icons">delete</i></button>
                                </div>';
                    return $button;
                })->rawColumns(['file_movement_passport', 'file_movement_secondary_certificate', 'file_movement_birth_certificate', 'file_movement_bachelor', 'file_movement_degree_transcript', 'file_movement_authorization', 'file_movement_image','file_movement_last_document', 'action'])->make(true);
            
    }

    public function movementMasterDataUserId($id) {
        $user = User::findorFail($id);
        $userMovementFiles = $user->file_movement()->first();
 

        return response()->json([
            'user' => $user,
            'userMovementFiles' => $userMovementFiles,
        ]);
    }

    public function movementMasterDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_movement_master);
        $userMovementFiles = $user->file_movement()->first();


        $userMovementFiles->update([
            'passport_status' => $request->passport_status,
            'secondary_certificate_status' => $request->secondary_certificate_status,
            'birth_certificate_status' => $request->birth_certificate_status,
            'bachelor_status' => $request->bachelor_status,
            'degree_transcript_status' => $request->degree_transcript_status,
            'authorization_status' => $request->authorization_status,
            'image_status' => $request->image_status,
            'last_document_status' => $request->last_document_status,
            'capabilities' => $request->capabilities,
            'other' => $request->other,
            'delegate_day' => $request->delegate_day != null ? $request->delegate_day : null,
            'delegate_month' => $request->delegate_month != null ? $request->delegate_month : null,
            'delegate_year' => $request->delegate_year != null ? $request->delegate_year : null,
            'steps' => $request->steps,
            'delegate_status' => $request->delegate_status,
            'equation_date' => $request->equation_date,
            'egypt_arrival' => $request->egypt_arrival,
            'comment' => $request->comment,
        ]);
        return response()->json(['success' => 'User updated successfully']);
    }

    public function movementMasterDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->file_movement()->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function movementPhdView() {
        return view('academic_guide.datatables.movement.movement_phd_datatables');
    }

    public function movementPhdData() {
        $model = User::select('users.id', 'users.degree_needed')->with('file_movement', 'user_admission_forms')->whereHas('user_admission_forms', function ($q) {
            $q->movementAdmissionForm();
        })->where('users.degree_needed', 'PhD')->where('users.role', 'user');

        return DataTables::of($model)
                ->addColumn('file_movement_passport', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['passport'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['passport']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_passport_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['passport_status'] == 0)
                    {
                        $userPersonalInfo['passport_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['passport_status'];
                    } else {
                        $userPersonalInfo['passport_status'] = ' تم القبول ';
                        return $userPersonalInfo['passport_status'];
                    }
                })
                ->addColumn('file_movement_secondary_certificate', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['secondary_certificate'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['secondary_certificate']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_secondary_certificate_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['secondary_certificate_status'] == 0)
                    {
                        $userPersonalInfo['secondary_certificate_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['secondary_certificate_status'];
                    } else {
                        $userPersonalInfo['secondary_certificate_status'] = ' تم القبول ';
                        return $userPersonalInfo['secondary_certificate_status'];
                    }
                })
                ->addColumn('file_movement_birth_certificate', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['birth_certificate'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['birth_certificate']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_birth_certificate_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['birth_certificate_status'] == 0)
                    {
                        $userPersonalInfo['birth_certificate_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['birth_certificate_status'];
                    } else {
                        $userPersonalInfo['birth_certificate_status'] = ' تم القبول ';
                        return $userPersonalInfo['birth_certificate_status'];
                    }
                })
                ->addColumn('file_movement_master', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['master'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['master']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_master_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['master_status'] == 0)
                    {
                        $userPersonalInfo['master_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['master_status'];
                    } else {
                        $userPersonalInfo['master_status'] = ' تم القبول ';
                        return $userPersonalInfo['master_status'];
                    }
                })
                ->addColumn('file_movement_authorization', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['authorization'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['authorization']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_authorization_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['authorization_status'] == 0)
                    {
                        $userPersonalInfo['authorization_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['authorization_status'];
                    } else {
                        $userPersonalInfo['authorization_status'] = ' تم القبول ';
                        return $userPersonalInfo['authorization_status'];
                    }
                })
                ->addColumn('file_movement_image', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['image'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['image']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_image_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['image_status'] == 0)
                    {
                        $userPersonalInfo['image_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['image_status'];
                    } else {
                        $userPersonalInfo['image_status'] = ' تم القبول ';
                        return $userPersonalInfo['image_status'];
                    }
                })
                ->addColumn('file_movement_last_document', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['last_document'] != NULL) {
                        $url = asset('movement/' . $userPersonalInfo['last_document']);
                        return '<img src="'.$url.'" border="0" width="100" height="60" class="img-rounded" align="center" />';
                    } else {
                        return 'لم يرسل صورة حتي الان';
                    }
                })
                ->addColumn('file_movement_last_document_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    if($userPersonalInfo['last_document_status'] == 0)
                    {
                        $userPersonalInfo['last_document_status'] = 'لم يتم القبول بعد';
                        return $userPersonalInfo['last_document_status'];
                    } else {
                        $userPersonalInfo['last_document_status'] = ' تم القبول ';
                        return $userPersonalInfo['last_document_status'];
                    }
                })
                ->addColumn('file_movement_capabilities', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['capabilities'];
                })
                ->addColumn('file_movement_other', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['other'];
                })
                ->addColumn('file_movement_day', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['day'];
                })
                ->addColumn('file_movement_month', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['month'];
                })
                ->addColumn('file_movement_year', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['year'];
                })
                ->addColumn('file_movement_delegate_day', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_day'];
                })
                ->addColumn('file_movement_delegate_month', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_month'];
                })
                ->addColumn('file_movement_delegate_year', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_year'];
                })
                ->addColumn('file_movement_steps', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['steps'];
                })
                ->addColumn('file_movement_delegate_status', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['delegate_status'];
                })
                ->addColumn('file_movement_equation_date', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['equation_date'];
                })
                ->addColumn('file_movement_egypt_arrival', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['egypt_arrival'];
                })
                ->addColumn('file_movement_comment', function (User $user) {
                    $userPersonalInfo = $user->file_movement()->first();
                    return $userPersonalInfo['comment'];
                })
                ->addColumn('action', function (User $user) {
                    $button = '<div class="d-flex justify-content-between">
                                    <button type="button" name="edit" id="'.$user->id.'" class="edit-movement-phd btn btn-primary btn-icon rounded-circle btn-sm"><i class="material-icons">edit</i></button>
                                    <button type="button" name="edit" id="'.$user->id.'" class="delete-movement-phd btn btn-danger btn-icon rounded-circle btn-sm"><i class="material-icons">delete</i></button>
                                </div>';
                    return $button;
                })->rawColumns(['file_movement_passport', 'file_movement_secondary_certificate', 'file_movement_birth_certificate', 'file_movement_master', 'file_movement_authorization', 'file_movement_image','file_movement_last_document', 'action'])->make(true);
            
    }

    public function movementPhdDataUserId($id) {
        $user = User::findorFail($id);
        $userMovementFiles = $user->file_movement()->first();
 

        return response()->json([
            'user' => $user,
            'userMovementFiles' => $userMovementFiles,
        ]);
    }

    public function movementPhdDataUserIdUpdate(Request $request) {
        $user = User::findorFail($request->hidden_id_movement_phd);
        $userMovementFiles = $user->file_movement()->first();


        $userMovementFiles->update([
            'passport_status' => $request->passport_status,
            'secondary_certificate_status' => $request->secondary_certificate_status,
            'birth_certificate_status' => $request->birth_certificate_status,
            'master_status' => $request->master_status,
            'authorization_status' => $request->authorization_status,
            'image_status' => $request->image_status,
            'last_document_status' => $request->last_document_status,
            'capabilities' => $request->capabilities,
            'other' => $request->other,
            'delegate_day' => $request->delegate_day != null ? $request->delegate_day : null,
            'delegate_month' => $request->delegate_month != null ? $request->delegate_month : null,
            'delegate_year' => $request->delegate_year != null ? $request->delegate_year : null,
            'steps' => $request->steps,
            'delegate_status' => $request->delegate_status,
            'equation_date' => $request->equation_date,
            'egypt_arrival' => $request->egypt_arrival,
            'comment' => $request->comment,
        ]);
        return response()->json(['success' => 'User updated successfully']);
    }

    public function movementPhdDataUserIdDelete($id) {
        $user = User::findorFail($id);

        $user->file_movement()->delete();

        return response()->json(['success' => 'User deleted successfully']);
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
