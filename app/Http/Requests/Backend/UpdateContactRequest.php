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
            'en_address' => '',
            'ar_address' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            
            'snapchat' => 'required', 
            'linkedin' => 'required', 
            'tiktok' => 'required',
            'banner_image' => 'mimes:jpg,jpeg,png,svg',
        ];
    }
}
