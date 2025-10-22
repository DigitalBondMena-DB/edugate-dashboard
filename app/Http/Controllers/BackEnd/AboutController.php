<?php

namespace App\Http\Controllers\BackEnd;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateAboutRequest;
use App\Services\ImageService;

class AboutController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $about = About::select('ar_story', 'en_story', 'image')->firstOrFail();
        return view('dashboard.about.index', compact('about'));
    }

    public function edit()
    {
        $about = About::firstOrFail();

        return view('dashboard.about.edit', compact('about'));
    }

    public function update(UpdateAboutRequest $request)
    {
        $data = $request->validated();

        $about = About::firstOrFail();

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'about', $about->image ?? null);
        }

        $about->update($data);

        Session::flash('flash_message', 'About updated successfully');
        return redirect()->route('about.index');
    }
}
