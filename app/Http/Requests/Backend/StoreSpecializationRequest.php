<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecializationRequest extends FormRequest
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
            'foundation_year' => 'integer',
            'department_id' => 'required|integer',
            'featured_image' => 'required|mimes:jpg,jpeg,png,svg',
            'banner_image' => 'required|mimes:jpg,jpeg,png,svg',
        ];
    }
}
