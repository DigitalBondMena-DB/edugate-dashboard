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
            'story_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'en_achevement_title' => 'nullable|string|max:255',
            'ar_achevement_title' => 'required|string|max:255',
            'en_achevement_text' => 'required|string|max:2000',
            'ar_achevement_text' => 'required|string|max:2000',
            'en_mission' => 'required|string|max:2000',
            'ar_mission' => 'required|string|max:2000',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'en_vision' => 'required|string|max:2000',
            'ar_vision' => 'required|string|max:2000',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'en_goal' => 'required|string|max:2000',
            'ar_goal' => 'required|string|max:2000'
        ];
    }
}
