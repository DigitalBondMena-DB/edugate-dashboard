<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicGuideRequest extends FormRequest
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
            'ar_name' => ['required', 'string', 'max:255'],
            'en_name' => ['required', 'string', 'max:255'],
            'image'   => ['mimes:jpg,jpeg,png,svg'],
            'phone' => ['required', 'digits:11'],
            'facebook_link' => ['string'],
            'tweet_link' => ['string'],
            'insta_link' => ['url'],
        ];
    }
}
