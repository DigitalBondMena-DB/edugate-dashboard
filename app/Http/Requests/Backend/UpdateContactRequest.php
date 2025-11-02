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
            'facebook' => 'required|string|url',
            'twitter' => 'required|string|url',
            'instagram' => 'required|string|url',
            'snapchat' => 'required|string|url',
            'linkedin' => 'required|string|url',
            'tiktok' => 'required|string|url',
            'youtube' => 'required|string|url',
            'banner_image' => 'mimes:jpg,jpeg,png,webp',
            'whatsapp_number' => 'sometimes|nullable|string',
            'map_url' => 'sometimes|nullable|url',
        ];
    }
}
