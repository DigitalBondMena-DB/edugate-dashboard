<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicesRequest extends FormRequest
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
            'en_name' => 'required|string|max:255',
            'ar_name' => 'required|string|max:255',
            'en_job_title' => 'required|string|max:255',
            'ar_job_title' => 'required|string|max:255',
            'en_text' => 'required|string',
            'ar_text' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }
}
