<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventDetailRequest extends FormRequest
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
            'en_text' => '',
            'ar_text' => 'required',
            'featured_image' => 'mimes:jpg,jpeg,png,svg',
            'banner_image' => 'mimes:jpg,jpeg,png,svg',
            'event_year' => 'required',
            'event_category_id' => 'required|integer',
        ];
    }
}
