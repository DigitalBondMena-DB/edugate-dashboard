<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeoTagRequest extends FormRequest
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
            'en_tag_title' => 'required|string',
            'ar_tag_title' => 'required|string',
            'en_tag_paragraph' => 'required|string',
            'ar_tag_paragraph' => 'required|string',
            // 'tag_type' =>'required|string|exists:seo_tags,tag_type'
        ];
    }
}
