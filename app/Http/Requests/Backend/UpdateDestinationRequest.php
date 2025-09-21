<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationRequest extends FormRequest
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
            'en_about_the_destination' => '',
            'ar_about_the_destination' => 'required',
            'flag' => 'mimes:jpg,jpeg,png,svg',
            'featured_image' => 'mimes:jpg,jpeg,png,svg',
            'banner_image' => 'mimes:jpg,jpeg,png,svg',
        ];
    }
}
