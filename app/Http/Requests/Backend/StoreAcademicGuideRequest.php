<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicGuideRequest extends FormRequest
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
            'image'   => ['required' , 'mimes:jpg,jpeg,png,svg'] ,
            'email' =>   ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'digits:11'],
            'facebook_link' => ['url'],
            'tweet_link' => ['url'],
            'insta_link' => ['url'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ];
    }
}
