<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
            'en_story' => 'required|string|max:5000',
            'ar_story' => 'required|string|max:5000',
            'en_mission' => 'required|string|max:2000',
            'ar_mission' => 'required|string|max:2000',
            'en_vision' => 'required|string|max:2000',
            'ar_vision' => 'required|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
