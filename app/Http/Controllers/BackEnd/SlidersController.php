<?php

namespace App\Http\Controllers\BackEnd;

use App\Slider;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreSlidersRequest;
use App\Http\Requests\Backend\UpdateSlidersRequest;
use Intervention\Image\Laravel\Facades\Image;

class SlidersController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Slider::select('id', 'image', 'ar_title', 'en_title', 'active')
                        ->orderBy('id')
                        ->paginate(10);
        return view('dashboard.sliders.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlidersRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.'webp';
            if(!file_exists(public_path('sliders'))) {
                mkdir(public_path('sliders'), 0755, true);
            }
            $imagePath = public_path('sliders/' . $fileName);
            $image = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            $data['image'] = $fileName;

            $row = Slider::create($data);
            Session::flash('flash_message', 'Slider added successfully');
            return redirect()->route('sliders.index');
        }
        Session::flash('flash_message', 'Error adding slider');
        return redirect()->route('sliders.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Slider::findorFail($id);

        return view('dashboard.sliders.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlidersRequest $request, Slider $slider)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().Str::random(10).'.'.'webp';
            if(!file_exists(public_path('sliders'))) {
                mkdir(public_path('sliders'), 0755, true);
            }
            $imagePath = public_path('sliders/' . $fileName);
            $image = Image::read($file->getRealPath())
                ->toWebp(80)
                ->save($imagePath);
            if($slider->image !== NULL) {
                if(file_exists(public_path('sliders/'. $slider->image))) {
                    unlink(public_path('sliders/'. $slider->image));
                }
            }
            $data['image'] = $fileName;
        }
        $slider->update($data);
        Session::flash('flash_message', 'Slider updated successfully');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $sliders = Slider::findorFail($id);

    //     if($sliders->image !== NULL) {
    //         if(file_exists(public_path('sliders/'. $sliders->image))) {
    //             unlink(public_path('sliders/'. $sliders->image));
    //         }
    //     }

    //     $sliders->delete();

    //     Session::flash('flash_message', 'Slider deleted successfully');
    //     return redirect()->route('sliders.index');
    // }
    public function toggleStatus(Slider $slider)
    {
        $slider->active = $slider->active === 'activated' ? 'deactivated' : 'activated';
        $slider->save();
        Session::flash('flash_message', "Slider {$slider->active} successfully.");
        return redirect()->route('sliders.index');
    }
}
