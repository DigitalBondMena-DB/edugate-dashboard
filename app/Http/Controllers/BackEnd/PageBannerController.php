<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class PageBannerController extends Controller
{
    public function index()
    {
        $row = PageBanner::select('id', 'title', 'ar_alt','en_alt','image')->get();
        return view('dashboard.page-banner.index', compact('row'));
    }

    public function edit(PageBanner $pageBanner)
    {
        return view('dashboard.page-banner.edit', ['banner' => $pageBanner]);
    }

    public function update(Request $request, PageBanner $pageBanner)
    {
        $data = $request->validate([
            'ar_alt' => 'required|string|max:255',
            'en_alt' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);
        $file = $request->file('image');
        $fileName = time() . Str::random(10) . '.' . 'webp';
        if (!file_exists(public_path('banners'))) {
            mkdir(public_path('banners'), 0755, true);
        }
        $imagePath = public_path('banners/' . $fileName);
        $image = Image::read($file->getRealPath())
            ->toWebp(80)
            ->save($imagePath);
        $data['image'] = $fileName;
        $pageBanner->update($data);

        Session::flash('flash_message', 'Banner updated successfully');
        return redirect()->route('page-banners.index');
    }
}
