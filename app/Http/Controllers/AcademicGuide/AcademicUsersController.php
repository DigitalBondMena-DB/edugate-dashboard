<?php

namespace App\Http\Controllers\AcademicGuide;

use App\User;
use App\AdmissionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class AcademicUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = auth()->user()->academic_admission_forms()->latest()->paginate(10);

        return view('academic_guide.academic_users.index', compact('rows'));
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
        $admissionForm = AdmissionForm::findorFail($id);

        $user = User::findorFail($admissionForm->user_id);

        $personalInfo = $user->personal_info()->first();
        $academicInfo = $user->academic_info()->first();

        return view('academic_guide.academic_users.show', compact('admissionForm', 'user', 'personalInfo', 'academicInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = AdmissionForm::findorFail($id);

        $user = User::findorFail($row->user_id);

        return view('academic_guide.academic_users.edit', compact('row', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'money_received' => 'required|integer'
        ]);

        $row = AdmissionForm::findorFail($id);

        $row->update([
            'money_received' => $request->money_received
        ]);

        Session::flash('flash_message', 'Admission Form updated successfully!');
        return redirect()->route('academic-users.index');
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
