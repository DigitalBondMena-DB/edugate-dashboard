<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\PageBanner;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Services\ImageService;


class PageBannerController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $row = PageBanner::select('id', 'title', 'ar_alt', 'en_alt', 'image')->get();
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
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'banners', $pageBanner->image);
        }
        $pageBanner->update($data);

        Session::flash('flash_message', 'Banner updated successfully');
        return redirect()->route('page-banners.index');
    }
}
