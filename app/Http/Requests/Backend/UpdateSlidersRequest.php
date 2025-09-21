<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlidersRequest extends FormRequest
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
            'en_title' => 'required|string|max:255',
            'ar_title' => 'required|string|max:255',
            'en_paragraph' => 'required|string',
            'ar_paragraph' => 'required|string',
            'image' =>'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048' // max size 2MB
        ];
    }
}
