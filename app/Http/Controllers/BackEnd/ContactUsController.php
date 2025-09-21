<?php

namespace App\Http\Controllers\BackEnd;

use App\ContactUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateContactRequest;

class ContactUsController extends Controller
{
    public function index() {
        $contact = ContactUs::first();

        return view('backend.contact_us.index', compact('contact'));
    }

    public function edit($id) {
        $row = ContactUs::findorFail($id);

        return view('backend.contact_us.edit', compact('row'));
    }

    public function update(UpdateContactRequest $request, $id) {
        $contact = ContactUs::findorFail($id);
        $requestArray = $request->all();
           
        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('contact'), $fileName);

            if($contact->banner_image !== NULL) {
                if(file_exists(public_path('contact/'. $contact->banner_image))) {
                    unlink(public_path('contact/'. $contact->banner_image));
                }
            }
        }
        $requestArray = ['banner_image' => $request->hasFile('banner_image') ? $fileName : $contact->banner_image] + $request->all();

        $contact->update($requestArray);

        Session::flash('flash_message', 'Contact Us updated successfully');
        return redirect()->route('contact-us.index');
    }
}
