<?php

namespace App\Http\Controllers\BackEnd;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateContactRequest;
class ContactUsController extends Controller
{

    public function index() {
        $contact = ContactUs::select('email', 'en_address','ar_address', 'phones')->firstOrFail();
        return view('dashboard.contact_us.index', compact('contact'));
    }

    public function edit() {
        $contact = ContactUs::firstOrFail();
        return view('dashboard.contact_us.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request) {
        $contactUs = ContactUs::firstOrFail();
        $data = $request->validated();
        $contactUs->update($data);
        Session::flash('flash_message', 'Contact us updated successfully');
        return redirect()->route('contact-us.index');
    }
}
