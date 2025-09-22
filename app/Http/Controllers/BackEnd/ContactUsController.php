<?php

namespace App\Http\Controllers\BackEnd;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateContactRequest;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str; 

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
           
        if($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time().Str::random(10).'.'.'webp';
            if(!file_exists(public_path('contact_us'))) {
                mkdir(public_path('contact_us'), 0755, true);
            }
            $imagePath = public_path('contact_us/' . $fileName);
            $image = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            if($contactUs->banner_image !== NULL) {
                if(file_exists(public_path('contact_us/'. $contactUs->banner_image))) {
                    unlink(public_path('contact_us/'. $contactUs->banner_image));
                }
            }
            $data['banner_image'] = $fileName;
        }

        $contactUs->update($data);
        Session::flash('success', 'Contact us updated successfully');
        return redirect()->route('contact-us.index');
    }
}
