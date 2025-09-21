<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreUpdateRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $creating = $this->route('article') ? false : true;

        return [
            'title.ar'   => [$creating ? 'required' : 'sometimes','string','max:160'],
            'title.en'   => [$creating ? 'required' : 'sometimes','string','max:160'],
            'body.ar'    => [$creating ? 'required' : 'sometimes','string'],
            'body.en'    => [$creating ? 'required' : 'sometimes','string'],
            'image'      => [$creating ? 'required' : 'sometimes','file','mimes:jpg,jpeg,png,webp','max:5120'],
            'is_published' => ['sometimes','boolean'],
            'position'     => ['sometimes','integer','min:1','max:65535'],
            'meta_title.ar'        => ['sometimes','nullable','string','max:70'],
            'meta_title.en'        => ['sometimes','nullable','string','max:70'],
            'meta_description.ar'  => ['sometimes','nullable','string','max:180'],
            'meta_description.en'  => ['sometimes','nullable','string','max:180'],
            'script_1.ar'          => ['sometimes','nullable','string','max:10000'],
            'script_1.en'          => ['sometimes','nullable','string','max:10000'],
            'script_2.ar'          => ['sometimes','nullable','string','max:10000'],
            'script_2.en'          => ['sometimes','nullable','string','max:10000'],
        ];
    }
}
