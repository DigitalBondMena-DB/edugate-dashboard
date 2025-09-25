<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateEventCategeryRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'ar_name'        => 'required|string|max:255',
            'en_name'        => 'required|string|max:255',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',

            'gallery_images'   => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'ar_name.required' => 'Arabic title is required.',
            'en_name.required' => 'English title is required.',
            'ar_description.required' => 'Arabic description is required.',
            'en_description.required' => 'English description is required.',
            
            'gallery_images.*.image'      => 'Gallery image must be an image.',
            'gallery_images.*.mimes'      => 'Gallery image must be a file of type: jpeg, png, jpg, webp.',
            'gallery_images.*.max'        => 'Gallery image size must not exceed 2MB.',

            'delete_images.*.exists'      => 'Gallery image not found.'
        ];
    }
}
