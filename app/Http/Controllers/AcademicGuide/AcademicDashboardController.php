<?php

namespace App\Http\Controllers\AcademicGuide;

use App\AdmissionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AcademicDashboardController extends Controller
{
    public function index() {
        $academicUsers = auth()->user()->academic_admission_forms()->count();
        $academicUsersMoneyReceived = AdmissionForm::where('academic_guide', auth()->user()->name)->where('registered', 1)->count();
        $academicBacheloarUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Bachelor')->count();
        $academicBacheloarUsersMoneyReceived = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Bachelor')->where('registered', 1)->count();
        $academicMastersUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Masters')->count();
        $academicMastersUsersMoneyReceived = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Masters')->where('registered', 1)->count();
        $academicPhDUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'PhD')->count();
        $academicPhDUsersMoneyReceived = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'PhD')->where('registered', 1)->count();

        return view('academic_guide.dashboard', compact('academicUsers', 'academicUsersMoneyReceived', 'academicBacheloarUsers', 'academicBacheloarUsersMoneyReceived', 'academicMastersUsers', 'academicMastersUsersMoneyReceived', 'academicPhDUsers', 'academicPhDUsersMoneyReceived'));
    }

    public function statistics() {
        $data = DB::table('admission_forms')
        ->select(
        DB::raw('degree_needed as degree_needed'),
        DB::raw('count(*) as number'))
        ->groupBy('degree_needed')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array[] = ['Degree', 'Number'];
        foreach($data as $key => $value)
        {
        $array[++$key] = [$value->degree_needed, $value->number];
        }

        $data1 = DB::table('admission_forms')
        ->select(
        DB::raw('registered as registered'),
        DB::raw('count(*) as number'))
        ->groupBy('registered')
        ->where('degree_needed', 'Bachelor')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array1[] = ['Degree', 'Number'];
        foreach($data1 as $key => $value)
        {
            if($value->registered == 0) {
                $value->registered = 'Not Registered';
                $array1[++$key] = [$value->registered, $value->number];
            } else {
                $value->registered = 'Registered';
                $array1[++$key] = [$value->registered, $value->number];
            }
        }

        $data2 = DB::table('admission_forms')
        ->select(
        DB::raw('registered as registered'),
        DB::raw('count(*) as number'))
        ->groupBy('registered')
        ->where('degree_needed', 'Master')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array2[] = ['Degree', 'Number'];
        foreach($data2 as $key => $value)
        {
            if($value->registered == 0) {
                $value->registered = 'Not Registered';
                $array2[++$key] = [$value->registered, $value->number];
            } else {
                $value->registered = 'Registered';
                $array2[++$key] = [$value->registered, $value->number];
            }
        }

        $data3 = DB::table('admission_forms')
        ->select(
        DB::raw('registered as registered'),
        DB::raw('count(*) as number'))
        ->groupBy('registered')
        ->where('degree_needed', 'PhD')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array3[] = ['Degree', 'Number'];
        foreach($data3 as $key => $value)
        {
            if($value->registered == 0) {
                $value->registered = 'Not Registered';
                $array3[++$key] = [$value->registered, $value->number];
            } else {
                $value->registered = 'Registered';
                $array3[++$key] = [$value->registered, $value->number];
            }
        }

        $numberOfBachelorUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Bachelor')->count();
        $numberOfMasterUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Master')->count();
        $numberOfPhDUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'PhD')->count();
        
        $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->where('academic_guide', auth()->user()->name)->sum('account_finance_first_number');
        $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->where('academic_guide', auth()->user()->name)->sum('account_finance_second_number');
        $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->where('academic_guide', auth()->user()->name)->sum('account_finance_third_number');
        $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->where('academic_guide', auth()->user()->name)->sum('account_finance_fourth_number');
        
        $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->where('academic_guide', auth()->user()->name)->sum('deal');

        $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

        return view('academic_guide.statistics', compact('numberOfBachelorUsers', 'numberOfMasterUsers', 'numberOfPhDUsers', 'totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing'))
        ->with('degrees', json_encode($array))
        ->with('bachelor_degrees', json_encode($array1))
        ->with('master_degrees', json_encode($array2))
        ->with('phd_degrees', json_encode($array3));
    }

    public function bachelorStatistics() {
        $data = DB::table('admission_forms')
        ->select(
        DB::raw('degree_needed as degree_needed'),
        DB::raw('count(*) as number'))
        ->groupBy('degree_needed')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array[] = ['Degree', 'Number'];
        foreach($data as $key => $value)
        {
            if($value->degree_needed == 'Bachelor') {
                $array[++$key] = [$value->degree_needed, $value->number];
            } else {
                if(isset($array[2][0])) {
                    $array[2][1] = $array[2][1] + $value->number;
                } else {
                    $value->degree_needed = 'Other';
                    $array[++$key] = [$value->degree_needed, $value->number];
                }
            }
        }

        $data1 = DB::table('admission_forms')
        ->select(
        DB::raw('registered as registered'),
        DB::raw('count(*) as number'))
        ->groupBy('registered')
        ->where('degree_needed', 'Bachelor')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array1[] = ['Degree', 'Number'];
        foreach($data1 as $key => $value)
        {
            if($value->registered == 0) {
                $value->registered = 'Not Registered';
                $array1[++$key] = [$value->registered, $value->number];
            } else {
                $value->registered = 'Registered';
                $array1[++$key] = [$value->registered, $value->number];
            }
        }

        $numberOfBachelorUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Bachelor')->count();
        $numberOfUnRegisteredBachelorUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Bachelor')->where('registered', 0)->count();
        $numberOfRegisteredBachelorUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Bachelor')->where('registered', 1)->count();
        
        $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->where('degree_needed', 'Bachelor')->where('academic_guide', auth()->user()->name)->sum('account_finance_first_number');
        $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->where('degree_needed', 'Bachelor')->where('academic_guide', auth()->user()->name)->sum('account_finance_second_number');
        $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->where('degree_needed', 'Bachelor')->where('academic_guide', auth()->user()->name)->sum('account_finance_third_number');
        $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->where('degree_needed', 'Bachelor')->where('academic_guide', auth()->user()->name)->sum('account_finance_fourth_number');
        
        $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->where('degree_needed', 'Bachelor')->where('academic_guide', auth()->user()->name)->sum('deal');

        $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

        return view('academic_guide.bachelor_statistics', compact('numberOfBachelorUsers', 'numberOfUnRegisteredBachelorUsers', 'numberOfRegisteredBachelorUsers', 'totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing'))
        ->with('degrees', json_encode($array))
        ->with('bachelor_degrees', json_encode($array1));
    }

    public function masterStatistics() {
        $data = DB::table('admission_forms')
        ->select(
        DB::raw('degree_needed as degree_needed'),
        DB::raw('count(*) as number'))
        ->groupBy('degree_needed')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        // dd($data);

        $array[] = ['Degree', 'Number'];
        foreach($data as $key => $value)
        {
            if($value->degree_needed == 'Bachelor') {
                $value->degree_needed = 'Other';
                $array[++$key] = [$value->degree_needed, $value->number];
            } elseif($value->degree_needed == 'PhD') {
                $array[1][1] = $array[1][1] + $value->number;
            } else {
                $array[++$key] = [$value->degree_needed, $value->number];
            }
        }

        $temp = $array[1];
        $array[1] = $array[2];
        $array[2] = $temp;

        $data1 = DB::table('admission_forms')
        ->select(
        DB::raw('registered as registered'),
        DB::raw('count(*) as number'))
        ->groupBy('registered')
        ->where('degree_needed', 'Master')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array1[] = ['Degree', 'Number'];
        foreach($data1 as $key => $value)
        {
            if($value->registered == 0) {
                $value->registered = 'Not Registered';
                $array1[++$key] = [$value->registered, $value->number];
            } else {
                $value->registered = 'Registered';
                $array1[++$key] = [$value->registered, $value->number];
            }
        }

        $numberOfMasterUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Master')->count();
        $numberOfUnRegisteredMasterUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Master')->where('registered', 0)->count();
        $numberOfRegisteredMasterUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'Master')->where('registered', 1)->count();
        
        $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->where('degree_needed', 'Master')->where('academic_guide', auth()->user()->name)->sum('account_finance_first_number');
        $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->where('degree_needed', 'Master')->where('academic_guide', auth()->user()->name)->sum('account_finance_second_number');
        $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->where('degree_needed', 'Master')->where('academic_guide', auth()->user()->name)->sum('account_finance_third_number');
        $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->where('degree_needed', 'Master')->where('academic_guide', auth()->user()->name)->sum('account_finance_fourth_number');
        
        $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->where('degree_needed', 'Master')->where('academic_guide', auth()->user()->name)->sum('deal');

        $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

        return view('academic_guide.master_statistics', compact('numberOfMasterUsers', 'numberOfUnRegisteredMasterUsers', 'numberOfRegisteredMasterUsers', 'totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing'))
        ->with('degrees', json_encode($array))
        ->with('master_degrees', json_encode($array1));
    }

    public function phdStatistics() {
        $data = DB::table('admission_forms')
        ->select(
        DB::raw('degree_needed as degree_needed'),
        DB::raw('count(*) as number'))
        ->groupBy('degree_needed')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array[] = ['Degree', 'Number'];
        foreach($data as $key => $value)
        {
            if($value->degree_needed == 'PhD') {
                $array[$key] = [$value->degree_needed, $value->number];
            } else {
                if(isset($array[1][0])) {
                    $array[1][1] = $array[1][1] + $value->number;
                } else {
                    $value->degree_needed = 'Other';
                    $array[++$key] = [$value->degree_needed, $value->number];
                }
            }
        }

        $temp = $array[1];
        $array[1] = $array[2];
        $array[2] = $temp;

        $data1 = DB::table('admission_forms')
        ->select(
        DB::raw('registered as registered'),
        DB::raw('count(*) as number'))
        ->groupBy('registered')
        ->where('degree_needed', 'PhD')
        ->where('academic_guide', auth()->user()->name)
        ->get();

        $array1[] = ['Degree', 'Number'];
        foreach($data1 as $key => $value)
        {
            if($value->registered == 0) {
                $value->registered = 'Not Registered';
                $array1[++$key] = [$value->registered, $value->number];
            } else {
                $value->registered = 'Registered';
                $array1[++$key] = [$value->registered, $value->number];
            }
        }

        $numberOfPhDUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'PhD')->count();
        $numberOfUnRegisteredPhDUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'PhD')->where('registered', 0)->count();
        $numberOfRegisteredPhDUsers = AdmissionForm::where('academic_guide', auth()->user()->name)->where('degree_needed', 'PhD')->where('registered', 1)->count();
        
        $totalMoneyRecievedForFirstPayment = AdmissionForm::where('account_finance_first_number', '!=', null)->where('account_finance_first_status', 1)->where('degree_needed', 'PhD')->where('academic_guide', auth()->user()->name)->sum('account_finance_first_number');
        $totalMoneyRecievedForSecondPayment = AdmissionForm::where('account_finance_second_number', '!=', null)->where('account_finance_second_status', 1)->where('degree_needed', 'PhD')->where('academic_guide', auth()->user()->name)->sum('account_finance_second_number');
        $totalMoneyRecievedForThirdPayment = AdmissionForm::where('account_finance_third_number', '!=', null)->where('account_finance_third_status', 1)->where('degree_needed', 'PhD')->where('academic_guide', auth()->user()->name)->sum('account_finance_third_number');
        $totalMoneyRecievedForFourthPayment = AdmissionForm::where('account_finance_fourth_number', '!=', null)->where('account_finance_fourth_status', 1)->where('degree_needed', 'PhD')->where('academic_guide', auth()->user()->name)->sum('account_finance_fourth_number');
        
        $totalMoneyShouldRecieved = AdmissionForm::where('deal', '!=', null)->where('degree_needed', 'PhD')->where('academic_guide', auth()->user()->name)->sum('deal');

        $totalMoneyMissing = $totalMoneyShouldRecieved - ($totalMoneyRecievedForFirstPayment + $totalMoneyRecievedForSecondPayment + $totalMoneyRecievedForThirdPayment + $totalMoneyRecievedForFourthPayment);

        return view('academic_guide.phd_statistics', compact('numberOfPhDUsers', 'numberOfUnRegisteredPhDUsers', 'numberOfRegisteredPhDUsers', 'totalMoneyRecievedForFirstPayment','totalMoneyRecievedForSecondPayment','totalMoneyRecievedForThirdPayment','totalMoneyRecievedForFourthPayment','totalMoneyShouldRecieved','totalMoneyMissing'))
        ->with('degrees', json_encode($array))
        ->with('phd_degrees', json_encode($array1));
    }
}
