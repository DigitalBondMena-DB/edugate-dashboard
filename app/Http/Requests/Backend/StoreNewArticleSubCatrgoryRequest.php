<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewArticleSubCatrgoryRequest extends FormRequest
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
            'en_title' => 'required|string|max:255',
            'ar_title' => 'required|string|max:255',
            'en_tag_title'  => 'required|string|max:255',
            'ar_tag_title'  => 'required|string|max:255',
            'en_tag_description'  => 'required|string',
            'ar_tag_description'  => 'required|string',
            'new_article_catrgory_id' => 'required|integer|exists:new_article_catrgories,id',
        ];
    }
}
