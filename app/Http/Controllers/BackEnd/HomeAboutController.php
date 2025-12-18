<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Services\ImageService;
use Illuminate\Support\Facades\Session;

class HomeAboutController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $homeAbout = HomeAbout::first();
        if (!$homeAbout) {
            $homeAbout = new HomeAbout();
        }
        return view('dashboard.home-about.index', compact('homeAbout'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'ar_text' => 'required',
            'en_text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $homeAbout = HomeAbout::first();
        if (!$homeAbout) {
            $homeAbout = new HomeAbout();
        }
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'home-about', $homeAbout->image ?? null);
        }
        $homeAbout->update($data);
        Session::flash('flash_message', 'About updated successfully');
        return redirect()->route('home-about.index');
    }

    public function edit()
    {
        $homeAbout = HomeAbout::first();

        if (!$homeAbout) {
            $homeAbout = new HomeAbout();
        }

        return view('dashboard.home-about.edit', compact('homeAbout'));
    }
}
