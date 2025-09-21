<?php

namespace App\Http\Controllers\BackEnd;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreAcademicGuideRequest;
use App\Http\Requests\Backend\UpdateAcademicGuideRequest;

class AcademicGuidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = User::latest()->where('role', 'academic-guide')->paginate(10);
        return view('backend.academic_guides.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic_guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcademicGuideRequest $request)
    {
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('users'), $fileName);
        }

        User::create([
            'ar_name' => $request['ar_name'],
            'en_name' => $request['en_name'],
            'image' =>   $fileName,
            'email' => $request['email'],
            'phone' => $request['phone'],
            'facebook_link' => $request['facebook_link'],
            'tweet_link' => $request['tweet_link'],
            'insta_link' => $request['insta_link'],
            'password' => Hash::make($request['password']),
            'role' => 'academic-guide',
       ]);

       Session::flash('flash_message', 'Academic Guide added successfully!');
       return redirect()->route('academic-guides.index');
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
        $row = User::findorFail($id);
        return view('backend.academic_guides.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcademicGuideRequest $request, $id)
    {
        $user = User::findorFail($id);


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('users'), $fileName);

            if($user->image !== NULL) {
                if(file_exists(public_path('users/'. $user->image))) {
                    unlink(public_path('users/'. $user->image));
                }
            }
        }
     

        $user->update([
            'ar_name' => $request['ar_name'],
            'en_name' => $request['en_name'],
            'image' => $request->hasFile('image') ? $fileName : $user->image,
            'phone' => $request['phone'],
            'facebook_link' => $request['facebook_link'],
            'tweet_link' => $request['tweet_link'],
            'insta_link' => $request['insta_link'],
        ]);

       Session::flash('flash_message', 'Academic Guide updated successfully!');
       return redirect()->route('academic-guides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();

        Session::flash('flash_message', 'Academic Guide deleted successfully!');
        return redirect()->route('academic-guides.index');
    }
}
