<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
            'email' => 'required|email',
            'en_address' => 'required|string',
            'ar_address' => 'required|string',
            'phones' => 'required|array',
            'phones.*' => 'sometimes|nullable|string',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'instagram' => 'required|string',
            'snapchat' => 'required|string',
            'linkedin' => 'required|string',
            'tiktok' => 'required|string',    
            'banner_image' => 'mimes:jpg,jpeg,png,webp',
        ];
    }
}
