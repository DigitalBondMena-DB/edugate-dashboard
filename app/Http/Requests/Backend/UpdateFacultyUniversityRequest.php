<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacultyUniversityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'en_faculty_vision' => '',
            'ar_faculty_vision' => 'required',
            'en_faculty_mission' => '',
            'ar_faculty_mission' => 'required',
            'foundation_year' => 'required|integer',
            'faculty_phone' => 'required',
            'faculty_site' => 'required',
            'logo' => 'mimes:jpg,jpeg,png,svg',
            'featured_image' => 'mimes:jpg,jpeg,png,svg',
            'banner_image' => 'mimes:jpg,jpeg,png,svg',
            'percentage' => 'required',
            'majors' => 'array'
        ];
    }
}
