<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\HeroSection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class HeroController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        return view('dashboard.hero.index', compact('hero'));
    }

    public function edit()
    {
        $hero = HeroSection::first();
        return view('dashboard.hero.edit', compact('hero'));
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
            $image = $request->file('image');
            $filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
            if(!file_exists(public_path('hero'))) {
                mkdir(public_path('hero'), 0755, true);
            }
            $path = public_path('hero/' . $filename);
            Image::read($image->getRealPath())
                ->toWebp(80)
                ->save($path);
            $data['image'] = $filename;
        }
        $hero = HeroSection::first();
        $hero->update($data);
        return redirect()->route('hero.index');
    }
}
