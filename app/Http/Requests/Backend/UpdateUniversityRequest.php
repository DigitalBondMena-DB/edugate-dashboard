<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUniversityRequest extends FormRequest
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
            'en_name' => '',
            'ar_name' => 'required',
            'en_about_the_university' => '',
            'ar_about_the_university' => 'required',
            'en_university_vision' => '',
            'ar_university_vision' => 'required',
            'en_university_mission' => '',
            'ar_university_mission' => 'required',
            'foundation_year' => 'required|integer',
            'en_university_type' => 'required',
            'university_site' => 'required|url',
            'en_governorate' => '',
            'ar_governorate' => 'required',
            'en_address' => '',
            'ar_address' => 'required',
            'destination_id' => 'required|integer',
            'faculties' => 'array',
            'logo' => 'mimes:jpg,jpeg,png,svg',
            'featured_image' => 'mimes:jpg,jpeg,png,svg',
            'banner_image' => 'mimes:jpg,jpeg,png,svg',
        ];
    }
}
