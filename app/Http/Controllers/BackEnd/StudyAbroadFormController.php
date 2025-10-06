<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudyAbroadForm;

class StudyAbroadFormController extends Controller
{
    public function index()
    {
        $rows = StudyAbroadForm::latest()->paginate(10);
        return view('dashboard.study_abroad.index', compact('rows'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $study_abroad = StudyAbroadForm::findorFail($id);
        
        $study_abroad->seen = true;
        $study_abroad->save();

        return view('dashboard.study_abroad.show', compact('study_abroad'));
    }
}
