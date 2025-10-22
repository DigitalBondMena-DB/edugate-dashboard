<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\WhyUs;
use App\Models\WhyUsField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Services\ImageService;

class WhyUsController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $why = WhyUs::select('image')->first();
        $fields = WhyUsField::select('field_ar', 'field_en', 'id', 'active')->get();
        return view('dashboard.why-us.index', compact('why', 'fields'));
    }

    public function create()
    {
        return view('dashboard.why-us.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'field_ar' => 'required|string|max:255',
            'field_en' => 'required|string|max:255',
        ]);

        WhyUsField::create($data);
        Session::flash('flash_message', 'Field created successfully!');
        return redirect()->route('why-us.index');
    }

    public function edit(WhyUsField $field)
    {
        return view('dashboard.why-us.edit', compact('field'));
    }

    public function update(Request $request, WhyUsField $field)
    {
        $data = $request->validate([
            'field_ar' => 'required|string|max:255',
            'field_en' => 'required|string|max:255',
        ]);

        $field->update($data);
        Session::flash('flash_message', 'Field updated successfully!');
        return redirect()->route('why-us.index');
    }

    public function updateImage(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $why = WhyUs::select('image')->first();

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->handle($request->file('image'), 'why-us', $why->image ?? null);
        }
        WhyUs::updateOrCreate([], $data);
        Session::flash('flash_message', 'Image updated successfully!');
        return redirect()->route('why-us.index');
    }

    public function editImage()
    {
        $why = WhyUs::select('image')->first();
        return view('dashboard.why-us.editImage', compact('why'));
    }

    public function toggleStatus(WhyUsField $field)
    {
        $field->active == 'activated' ? $field->active = 'deactivated' : $field->active = 'activated';
        $field->save();
        Session::flash('flash_message', "Field {$field->active} successfully.");
        return redirect()->route('why-us.index');
    }
}
