<?php

namespace App\Http\Controllers\BackEnd;

use App\User;
use App\Faculty;
use App\Department;
use App\University;
use App\Destination;
use App\UserAcademic;
use App\AdmissionForm;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {

        

        return view('backend.dashboard');
    }

    // public function statistics() {
    //     $data = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('degree_needed as degree_needed'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('degree_needed')
    //     ->get();

    //     $array[] = ['Degree', 'Number'];
    //     foreach($data as $key => $value)
    //     {
    //     $array[++$key] = [$value->degree_needed, $value->number];
    //     }

    //     $data1 = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('registered as registered'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('registered')
    //     ->where('degree_needed', 'Bachelor')
    //     ->get();

    //     $array1[] = ['Degree', 'Number'];
    //     foreach($data1 as $key => $value)
    //     {
    //         if($value->registered == 0) {
    //             $value->registered = 'Not Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         } else {
    //             $value->registered = 'Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         }
    //     }

    //     $data2 = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('registered as registered'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('registered')
    //     ->where('degree_needed', 'Master')
    //     ->get();

    //     $array2[] = ['Degree', 'Number'];
    //     foreach($data2 as $key => $value)
    //     {
    //         if($value->registered == 0) {
    //             $value->registered = 'Not Registered';
    //             $array2[++$key] = [$value->registered, $value->number];
    //         } else {
    //             $value->registered = 'Registered';
    //             $array2[++$key] = [$value->registered, $value->number];
    //         }
    //     }

    //     $data3 = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('registered as registered'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('registered')
    //     ->where('degree_needed', 'PhD')
    //     ->get();

    //     $array3[] = ['Degree', 'Number'];
    //     foreach($data3 as $key => $value)
    //     {
    //         if($value->registered == 0) {
    //             $value->registered = 'Not Registered';
    //             $array3[++$key] = [$value->registered, $value->number];
    //         } else {
    //             $value->registered = 'Registered';
    //             $array3[++$key] = [$value->registered, $value->number];
    //         }
    //     }

    //     $data4 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number + account_finance_second_number + account_finance_third_number + account_finance_fourth_number) as total_money'))
    //     ->groupBy('en_academic_guide')
    //     ->get();

    //     $array4[] = ['Academic Guide', 'Total Money'];
    //     foreach($data4 as $key => $value)
    //     {
    //         $array4[++$key] = [$value->en_academic_guide, $value->total_money]; 
    //     }

    //     $data5 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number) as account_finance_first_number'))
    //     ->groupBy('en_academic_guide')
    //     ->get();

    //     $array5[] = ['Academic Guide', 'first Payment Money'];
    //     foreach($data5 as $key => $value)
    //     {
    //         $array5[++$key] = [$value->en_academic_guide, $value->account_finance_first_number]; 
    //     }

    //     $data6 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_second_number) as account_finance_second_number'))
    //     ->groupBy('en_academic_guide')
    //     ->get();

    //     $array6[] = ['Academic Guide', 'Second Payment Money'];
    //     foreach($data6 as $key => $value)
    //     {
    //         $array6[++$key] = [$value->en_academic_guide, $value->account_finance_second_number]; 
    //     }

    //     $data7 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_third_number) as account_finance_third_number'))
    //     ->groupBy('en_academic_guide')
    //     ->get();

    //     $array7[] = ['Academic Guide', 'Third Payment Money'];
    //     foreach($data7 as $key => $value)
    //     {
    //         $array7[++$key] = [$value->en_academic_guide, $value->account_finance_third_number]; 
    //     }

    //     $data8 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_fourth_number) as account_finance_fourth_number'))
    //     ->groupBy('en_academic_guide')
    //     ->get();

    //     $array8[] = ['Academic Guide', 'Fourth Payment Money'];
    //     foreach($data8 as $key => $value)
    //     {
    //         $array8[++$key] = [$value->en_academic_guide, $value->account_finance_fourth_number]; 
    //     }

    //     $admins = User::where('role', 'super-admin')->orWhere('role', 'admin')->count();
    //     $academicGuides = User::where('role', 'academic-guide')->count();
    //     $users = AdmissionForm::where('registered', 0)->count();
    //     $registeredUsers = AdmissionForm::where('registered', 1)->count();
    //     $destinations = Destination::count();
    //     $universities = University::count();
    //     $faculties = Faculty::count();
    //     $departments = Department::count();
    //     $specializations = Specialization::count();
    //     $admissionForms = AdmissionForm::count();
        
    //     $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->sum('account_finance_first_number');
    //     $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->sum('account_finance_second_number');
    //     $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->sum('account_finance_third_number');
    //     $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->sum('account_finance_fourth_number');
        
    //     $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->sum('deal');

    //     $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

    //     $lastest10Users = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->listAdmissionForm();
    //     })->where('role', 'user')->orderBy('id', 'desc')->limit(10)->get();
    //     $lastest10RegisteredUsers = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->registerAdmissionForm();
    //     })->where('role', 'user')->orderBy('id', 'desc')->limit(10)->get();
    //     $lastest10AcademicGuides = User::where('role', 'academic-guide')->orderBy('id', 'desc')->limit(10)->get();

    //     return view('backend.statistics', compact('admins','academicGuides','users','registeredUsers','destinations','universities','faculties','departments','specializations','admissionForms','totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing','lastest10Users','lastest10RegisteredUsers','lastest10AcademicGuides'))
    //     ->with('degrees', json_encode($array))
    //     ->with('bachelor_degrees', json_encode($array1))
    //     ->with('master_degrees', json_encode($array2))
    //     ->with('phd_degrees', json_encode($array3))
    //     ->with('academic_guides_total_money', json_encode($array4))
    //     ->with('academic_guides_first_payment_money', json_encode($array5))
    //     ->with('academic_guides_second_payment_money', json_encode($array6))
    //     ->with('academic_guides_third_payment_money', json_encode($array7))
    //     ->with('academic_guides_fourth_payment_money', json_encode($array8));
    // }

    // public function bachelorStatistics() {
    //     $data = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('degree_needed as degree_needed'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('degree_needed')
    //     ->get();

    //     $array[] = ['Degree', 'Number'];
    //     foreach($data as $key => $value)
    //     {
    //         if($value->degree_needed == 'Bachelor') {
    //             $array[++$key] = [$value->degree_needed, $value->number];
    //         } else {
    //             if(isset($array[2][0])) {
    //                 $array[2][1] = $array[2][1] + $value->number;
    //             } else {
    //                 $value->degree_needed = 'Other';
    //                 $array[++$key] = [$value->degree_needed, $value->number];
    //             }
    //         }
    //     }

    //     $data1 = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('registered as registered'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('registered')
    //     ->where('degree_needed', 'Bachelor')
    //     ->get();

    //     $array1[] = ['Degree', 'Number'];
    //     foreach($data1 as $key => $value)
    //     {
    //         if($value->registered == 0) {
    //             $value->registered = 'Not Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         } else {
    //             $value->registered = 'Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         }
    //     }

    //     $data4 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number + account_finance_second_number + account_finance_third_number + account_finance_fourth_number) as total_money'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Bachelor')
    //     ->get();

    //     $array4[] = ['Academic Guide', 'Total Money'];
    //     foreach($data4 as $key => $value)
    //     {
    //         $array4[++$key] = [$value->en_academic_guide, $value->total_money]; 
    //     }
        
    //     $data5 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number) as account_finance_first_number'))
    //     ->groupBy('en_academic_guide') 
    //     ->where('degree_needed', 'Bachelor')
    //     ->get();

    //     $array5[] = ['Academic Guide', 'first Payment Money'];
    //     foreach($data5 as $key => $value)
    //     {
    //         $array5[++$key] = [$value->en_academic_guide, $value->account_finance_first_number]; 
    //     }

    //     $data6 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_second_number) as account_finance_second_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Bachelor')
    //     ->get();

    //     $array6[] = ['Academic Guide', 'Second Payment Money'];
    //     foreach($data6 as $key => $value)
    //     {
    //         $array6[++$key] = [$value->en_academic_guide, $value->account_finance_second_number]; 
    //     }

    //     $data7 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_third_number) as account_finance_third_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Bachelor')
    //     ->get();

    //     $array7[] = ['Academic Guide', 'Third Payment Money'];
    //     foreach($data7 as $key => $value)
    //     {
    //         $array7[++$key] = [$value->en_academic_guide, $value->account_finance_third_number]; 
    //     }

    //     $data8 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_fourth_number) as account_finance_fourth_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Bachelor')
    //     ->get();

    //     $array8[] = ['Academic Guide', 'Fourth Payment Money'];
    //     foreach($data8 as $key => $value)
    //     {
    //         $array8[++$key] = [$value->en_academic_guide, $value->account_finance_fourth_number]; 
    //     }
        

    //     $admins = User::where('role', 'super-admin')->orWhere('role', 'admin')->count();
    //     $users = AdmissionForm::where('degree_needed', 'Bachelor')->count();
    //     $unRegisteredUsers = AdmissionForm::where('registered', 0)->where('degree_needed', 'Bachelor')->count();
    //     $registeredUsers = AdmissionForm::where('registered', 1)->where('degree_needed', 'Bachelor')->count();
        
    //     $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->where('degree_needed', 'Bachelor')->sum('account_finance_first_number');
    //     $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->where('degree_needed', 'Bachelor')->sum('account_finance_second_number');
    //     $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->where('degree_needed', 'Bachelor')->sum('account_finance_third_number');
    //     $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->where('degree_needed', 'Bachelor')->sum('account_finance_fourth_number');
        
    //     $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->where('degree_needed', 'Bachelor')->sum('deal');

    //     $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

    //     $lastest10Users = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->listAdmissionForm();
    //     })->where('role', 'user')->where('degree_needed', 'Bachelor')->orderBy('id', 'desc')->limit(10)->get();
    //     $lastest10RegisteredUsers = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->registerAdmissionForm();
    //     })->where('role', 'user')->where('degree_needed', 'Bachelor')->orderBy('id', 'desc')->limit(10)->get();

    //     return view('backend.bachelor_statistics', compact('admins','users','unRegisteredUsers','registeredUsers','totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing','lastest10Users','lastest10RegisteredUsers'))
    //     ->with('degrees', json_encode($array))
    //     ->with('bachelor_degrees', json_encode($array1))
    //     ->with('academic_guides_total_money', json_encode($array4))
    //     ->with('academic_guides_first_payment_money', json_encode($array5))
    //     ->with('academic_guides_second_payment_money', json_encode($array6))
    //     ->with('academic_guides_third_payment_money', json_encode($array7))
    //     ->with('academic_guides_fourth_payment_money', json_encode($array8));
    // }

    // public function masterStatistics() {
    //     $data = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('degree_needed as degree_needed'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('degree_needed')
    //     ->get();

    //     // dd($data);

    //     $array[] = ['Degree', 'Number'];
    //     foreach($data as $key => $value)
    //     {
    //         if($value->degree_needed == 'Bachelor') {
    //             $value->degree_needed = 'Other';
    //             $array[++$key] = [$value->degree_needed, $value->number];
    //         } elseif($value->degree_needed == 'PhD') {
    //             $array[1][1] = $array[1][1] + $value->number;
    //         } else {
    //             $array[++$key] = [$value->degree_needed, $value->number];
    //         }
    //     }

    //     $temp = $array[1];
    //     $array[1] = $array[2];
    //     $array[2] = $temp;

    //     $data1 = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('registered as registered'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('registered')
    //     ->where('degree_needed', 'Master')
    //     ->get();

    //     $array1[] = ['Degree', 'Number'];
    //     foreach($data1 as $key => $value)
    //     {
    //         if($value->registered == 0) {
    //             $value->registered = 'Not Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         } else {
    //             $value->registered = 'Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         }
    //     }

    //     $data4 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number + account_finance_second_number + account_finance_third_number + account_finance_fourth_number) as total_money'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Master')
    //     ->get();

    //     $array4[] = ['Academic Guide', 'Total Money'];
    //     foreach($data4 as $key => $value)
    //     {
    //         $array4[++$key] = [$value->en_academic_guide, $value->total_money]; 
    //     }

    //     $data5 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number) as account_finance_first_number'))
    //     ->groupBy('en_academic_guide') 
    //     ->where('degree_needed', 'Master')
    //     ->get();

    //     $array5[] = ['Academic Guide', 'first Payment Money'];
    //     foreach($data5 as $key => $value)
    //     {
    //         $array5[++$key] = [$value->en_academic_guide, $value->account_finance_first_number]; 
    //     }

    //     $data6 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_second_number) as account_finance_second_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Master')
    //     ->get();

    //     $array6[] = ['Academic Guide', 'Second Payment Money'];
    //     foreach($data6 as $key => $value)
    //     {
    //         $array6[++$key] = [$value->en_academic_guide, $value->account_finance_second_number]; 
    //     }

    //     $data7 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_third_number) as account_finance_third_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Master')
    //     ->get();

    //     $array7[] = ['Academic Guide', 'Third Payment Money'];
    //     foreach($data7 as $key => $value)
    //     {
    //         $array7[++$key] = [$value->en_academic_guide, $value->account_finance_third_number]; 
    //     }

    //     $data8 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_fourth_number) as account_finance_fourth_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'Master')
    //     ->get();

    //     $array8[] = ['Academic Guide', 'Fourth Payment Money'];
    //     foreach($data8 as $key => $value)
    //     {
    //         $array8[++$key] = [$value->en_academic_guide, $value->account_finance_fourth_number]; 
    //     }

    //     $admins = User::where('role', 'super-admin')->orWhere('role', 'admin')->count();
    //     $users = AdmissionForm::where('degree_needed', 'Master')->count();
    //     $unRegisteredUsers = AdmissionForm::where('registered', 0)->where('degree_needed', 'Master')->count();
    //     $registeredUsers = AdmissionForm::where('registered', 1)->where('degree_needed', 'Master')->count();
        
    //     $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->where('degree_needed', 'Master')->sum('account_finance_first_number');
    //     $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->where('degree_needed', 'Master')->sum('account_finance_second_number');
    //     $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->where('degree_needed', 'Master')->sum('account_finance_third_number');
    //     $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->where('degree_needed', 'Master')->sum('account_finance_fourth_number');
        
    //     $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->where('degree_needed', 'Master')->sum('deal');

    //     $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

    //     $lastest10Users = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->listAdmissionForm();
    //     })->where('role', 'user')->where('degree_needed', 'Master')->orderBy('id', 'desc')->limit(10)->get();
    //     $lastest10RegisteredUsers = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->registerAdmissionForm();
    //     })->where('role', 'user')->where('degree_needed', 'Master')->orderBy('id', 'desc')->limit(10)->get();

    //     return view('backend.master_statistics', compact('admins','users','unRegisteredUsers','registeredUsers','totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing','lastest10Users','lastest10RegisteredUsers'))
    //     ->with('degrees', json_encode($array))
    //     ->with('master_degrees', json_encode($array1))
    //     ->with('academic_guides_total_money', json_encode($array4))
    //     ->with('academic_guides_first_payment_money', json_encode($array5))
    //     ->with('academic_guides_second_payment_money', json_encode($array6))
    //     ->with('academic_guides_third_payment_money', json_encode($array7))
    //     ->with('academic_guides_fourth_payment_money', json_encode($array8));
    // }

    // public function phdStatistics() {
    //     $data = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('degree_needed as degree_needed'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('degree_needed')
    //     ->get();

    //     $array[] = ['Degree', 'Number'];
    //     foreach($data as $key => $value)
    //     {
    //         if($value->degree_needed == 'PhD') {
    //             $array[$key] = [$value->degree_needed, $value->number];
    //         } else {
    //             if(isset($array[1][0])) {
    //                 $array[1][1] = $array[1][1] + $value->number;
    //             } else {
    //                 $value->degree_needed = 'Other';
    //                 $array[++$key] = [$value->degree_needed, $value->number];
    //             }
    //         }
    //     }

    //     $temp = $array[1];
    //     $array[1] = $array[2];
    //     $array[2] = $temp;

    //     $data1 = DB::table('admission_forms')
    //     ->select(
    //     DB::raw('registered as registered'),
    //     DB::raw('count(*) as number'))
    //     ->groupBy('registered')
    //     ->where('degree_needed', 'PhD')
    //     ->get();

    //     $array1[] = ['Degree', 'Number'];
    //     foreach($data1 as $key => $value)
    //     {
    //         if($value->registered == 0) {
    //             $value->registered = 'Not Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         } else {
    //             $value->registered = 'Registered';
    //             $array1[++$key] = [$value->registered, $value->number];
    //         }
    //     }

    //     $data4 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number + account_finance_second_number + account_finance_third_number + account_finance_fourth_number) as total_money'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'PhD')
    //     ->get();

    //     $array4[] = ['Academic Guide', 'Total Money'];
    //     foreach($data4 as $key => $value)
    //     {
    //         $array4[++$key] = [$value->en_academic_guide, $value->total_money]; 
    //     }


        
        
    //     $data5 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_first_number) as account_finance_first_number'))
    //     ->groupBy('en_academic_guide') 
    //     ->where('degree_needed', 'PhD')
    //     ->get();

    //     $array5[] = ['Academic Guide', 'first Payment Money'];
    //     foreach($data5 as $key => $value)
    //     {
    //         $array5[++$key] = [$value->en_academic_guide, $value->account_finance_first_number]; 
    //     }

    //     $data6 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_second_number) as account_finance_second_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'PhD')
    //     ->get();

    //     $array6[] = ['Academic Guide', 'Second Payment Money'];
    //     foreach($data6 as $key => $value)
    //     {
    //         $array6[++$key] = [$value->en_academic_guide, $value->account_finance_second_number]; 
    //     }

    //     $data7 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_third_number) as account_finance_third_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'PhD')
    //     ->get();

    //     $array7[] = ['Academic Guide', 'Third Payment Money'];
    //     foreach($data7 as $key => $value)
    //     {
    //         $array7[++$key] = [$value->en_academic_guide, $value->account_finance_third_number]; 
    //     }

    //     $data8 = DB::table('admission_forms')
    //     ->select(
    //         DB::raw('en_academic_guide as en_academic_guide'),
    //         DB::raw('sum(account_finance_fourth_number) as account_finance_fourth_number'))
    //     ->groupBy('en_academic_guide')
    //     ->where('degree_needed', 'PhD')
    //     ->get();

    //     $array8[] = ['Academic Guide', 'Fourth Payment Money'];
    //     foreach($data8 as $key => $value)
    //     {
    //         $array8[++$key] = [$value->en_academic_guide, $value->account_finance_fourth_number]; 
    //     }

    //     $admins = User::where('role', 'super-admin')->orWhere('role', 'admin')->count();
    //     $users = AdmissionForm::where('degree_needed', 'PhD')->count();
    //     $unRegisteredUsers = AdmissionForm::where('registered', 0)->where('degree_needed', 'PhD')->count();
    //     $registeredUsers = AdmissionForm::where('registered', 1)->where('degree_needed', 'PhD')->count();
        
    //     $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->where('degree_needed', 'PhD')->sum('account_finance_first_number');
    //     $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->where('degree_needed', 'PhD')->sum('account_finance_second_number');
    //     $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->where('degree_needed', 'PhD')->sum('account_finance_third_number');
    //     $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->where('degree_needed', 'PhD')->sum('account_finance_fourth_number');
        
    //     $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->where('degree_needed', 'PhD')->sum('deal');

    //     $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

    //     $lastest10Users = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->listAdmissionForm();
    //     })->where('role', 'user')->where('degree_needed', 'PhD')->orderBy('id', 'desc')->limit(10)->get();
    //     $lastest10RegisteredUsers = User::with('user_admission_forms')->whereHas('user_admission_forms', function ($q) {
    //         $q->registerAdmissionForm();
    //     })->where('role', 'user')->where('degree_needed', 'PhD')->orderBy('id', 'desc')->limit(10)->get();

    //     return view('backend.phd_statistics', compact('admins','users','unRegisteredUsers','registeredUsers','totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing','lastest10Users','lastest10RegisteredUsers'))
    //     ->with('degrees', json_encode($array))
    //     ->with('phd_degrees', json_encode($array1))
    //     ->with('academic_guides_total_money', json_encode($array4))
    //     ->with('academic_guides_first_payment_money', json_encode($array5))
    //     ->with('academic_guides_second_payment_money', json_encode($array6))
    //     ->with('academic_guides_third_payment_money', json_encode($array7))
    //     ->with('academic_guides_fourth_payment_money', json_encode($array8));
    // }
}
