<?php

namespace App\Http\Controllers\BackEnd;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\UpdateAboutRequest;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::select('ar_story', 'en_story', 'story_image')->firstOrFail();
        return view('dashboard.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about = About::firstOrFail();

        return view('dashboard.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request)
    {
        // dd('here');
        $data = $request->validated();

        $about = About::firstOrFail();
        // dd($about);

        if($request->hasFile('story_image')) {
            $fileName = $this->imageHandler($request->file('story_image'), $about->story_image);
            $data['story_image'] = $fileName;
        }

        if($request->hasFile('mission_image')) {
            
           $fileName = $this->imageHandler($request->file('mission_image'), $about->mission_image);
            $data['mission_image'] = $fileName;
        }

        if($request->hasFile('vision_image')) {
            $fileName = $this->imageHandler($request->file('vision_image'), $about->vision_image);
            $data['vision_image'] = $fileName;
        }

        if($request->hasFile('banner_image')) {
            $fileName = $this->imageHandler($request->file('banner_image'), $about->banner_image);
            $data['banner_image'] = $fileName;
        }

        $about->update($data);

        Session::flash('flash_message', 'About updated successfully');
        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function imageHandler($file, $existingImage = null) {
        $fileName = time().Str::random(10).'.'.'webp';
        if(!file_exists(public_path('about'))) {
            mkdir(public_path('about'), 0755, true);
        }
        $imagePath = public_path('about/' . $fileName);
        $image = Image::read($file->getRealPath())
            ->toWebp(80)
            ->save($imagePath);
        if($existingImage !== NULL) {
            if(file_exists(public_path('about/'. $existingImage))) {
                unlink(public_path('about/'. $existingImage));
            }
        }
        return $fileName;
    }
}
