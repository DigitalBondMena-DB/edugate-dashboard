<?php

namespace App\Http\Controllers\BackEnd;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateContactRequest;
use App\Services\ImageService;
class ContactUsController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService) {
        $this->imageService = $imageService;
    }
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
            $data['banner_image'] = $this->imageService->handle($request->file('banner_image'), 'contact_us', $contactUs->banner_image ?? null);
        }
        $contactUs->update($data);
        Session::flash('success', 'Contact us updated successfully');
        return redirect()->route('contact-us.index');
    }
}
