<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
            'en_department_vision' => '',
            'ar_department_vision' => '',
            'en_department_mission' => '',
            'ar_department_mission' => '',
            'foundation_year' => 'integer',
            'facultyMajorUniversities' => 'array',
            'featured_image' => 'mimes:jpg,jpeg,png,svg',
            'banner_image' => 'mimes:jpg,jpeg,png,svg',
        ];
    }
}
