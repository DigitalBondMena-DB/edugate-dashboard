<?php

namespace App\Http\Controllers\BackEnd;

use App\User;
use App\AdmissionForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminAcademicUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = AdmissionForm::latest()->paginate(10);

        return view('backend.admin_academic_users.index', compact('rows'));
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
        $row = AdmissionForm::findorFail($id);
        $academicGuides = User::where('role', 'academic-guide')->get();

        return view('backend.admin_academic_users.edit', compact('row', 'academicGuides'));
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
            'academic_guide_id' => 'required|integer'
        ]);

        $row = AdmissionForm::findorFail($id);

        $row->update([
            'academic_guide_id' => $request->academic_guide_id
        ]);

        Session::flash('flash_message', 'Admission form updated successfully!');
        return redirect()->route('admin-academic-users.index');
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
