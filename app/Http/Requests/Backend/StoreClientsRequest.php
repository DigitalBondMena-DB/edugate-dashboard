<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientsRequest extends FormRequest
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
            'logo' =>'required|mimes:jpg,jpeg,png,webp',
            'link' => 'required|url'
        ];
    }
}
