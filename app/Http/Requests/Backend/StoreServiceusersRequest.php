<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceusersRequest extends FormRequest
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
            'en_name' => 'required|string|max:100',
            'ar_name' => 'required|string|max:100',
            'en_first_text' => 'required|string',
            'ar_first_text' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,webp'
        ];
    }
}
