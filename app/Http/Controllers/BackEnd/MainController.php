<?php

namespace App\Http\Controllers\BackEnd;

use App\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateMainRequest;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main = Main::findorFail(1);

        return view('backend.mains.index', compact('main'));
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
        $row = Main::findorFail($id);

        return view('backend.mains.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMainRequest $request, $id)
    {
        $requestArray = $request->all();

        $main = Main::findorFail($id);

        if($request->hasFile('first_section_first_image')) {
            $file = $request->file('first_section_first_image');
            $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('main'), $fileName);

            if($main->first_section_first_image !== NULL) {
                if (file_exists(public_path('main/'. $main->first_section_first_image))) {
                    unlink(public_path('main/'. $main->first_section_first_image));
                }
            }
        }

        if($request->hasFile('first_section_second_image')) {
            $file1 = $request->file('first_section_second_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('main'), $fileName1);

            if($main->first_section_second_image !== NULL) {
                if (file_exists(public_path('main/'. $main->first_section_second_image))) {
                    unlink(public_path('main/'. $main->first_section_second_image));
                }
            }
        }

        if($request->hasFile('first_section_third_image')) {
            $file1 = $request->file('first_section_third_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('main'), $fileName1);

            if($main->first_section_third_image !== NULL) {
                if (file_exists(public_path('main/'. $main->first_section_third_image))) {
                    unlink(public_path('main/'. $main->first_section_third_image));
                }
            }
        }

        if($request->hasFile('last_section_image')) {
            $file1 = $request->file('last_section_image');
            $fileName1 = time().str_random(10).'.'.$file1->getClientOriginalExtension();
            $file1->move(public_path('main'), $fileName1);

            if($main->last_section_image !== NULL) {
                if (file_exists(public_path('main/'. $main->last_section_image))) {
                    unlink(public_path('main/'. $main->last_section_image));
                }
            }
        }

        $requestArray = ['first_section_first_image' => $request->hasFile('first_section_first_image') ? $fileName : $main->first_section_first_image, 
        'first_section_second_image' => $request->hasFile('first_section_second_image') ? $fileName1 : $main->first_section_second_image, 
        'first_section_third_image' => $request->hasFile('first_section_third_image') ? $fileName : $main->first_section_third_image, 
        'last_section_image' => $request->hasFile('last_section_image') ? $fileName1 : $main->last_section_image, 
        ] + $request->all();

        $main->update($requestArray);

        Session::flash('flash_message', 'Main updated successfully!');
        return redirect()->route('mains.index');
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
