<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewArticleSubCatrgoryRequest extends FormRequest
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
            'en_tag_title'  => '',
            'ar_tag_title'  => 'required',
            'en_tag_description'  => '',
            'ar_tag_description'  => 'required',
            'new_article_catrgory_id' => 'required',
        ];
    }
}
