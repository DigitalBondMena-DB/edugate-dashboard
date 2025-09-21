<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewArticleRequest extends FormRequest
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
            'en_title' => '',
            'ar_title' => 'required',
            'en_text' => '',
            'ar_text' => 'required',
            'video_link' => 'url' ,
            'image' => 'mimes:jpg,jpeg,png,svg',
            'news_link' => 'url',
            'news_site_en_name' => '',
            'news_site_ar_name' => 'required',
            'news_date' => 'date'
        ];
    }
}
