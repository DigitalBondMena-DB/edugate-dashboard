<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageService;

class HeroController extends Controller
{
    protected $imageService;
    protected $heroSection;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
        $this->heroSection = HeroSection::first() ?? new HeroSection();
    }
    public function index()
    {
        return view('dashboard.hero.index', ['hero' => $this->heroSection]);
    }

    public function edit()
    {
        return view('dashboard.hero.edit', ['hero' => $this->heroSection]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title_ar' => 'required|string|max:100',
            'title_en' => 'required|string|max:100',
            'first_description_ar' => 'required|string',
            'first_description_en' => 'required|string',
            'second_description_ar' => 'required|string',
            'second_description_en' => 'required|string',
            'image' => 'mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] =  $this->imageService->handle($request->file('image'), 'hero', $this->heroSection->image ?? null);
        }
        $this->heroSection->update($data);
        return redirect()->route('hero.index');
    }
}

