<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAdmissionInfoRequest extends FormRequest
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
            'admission_destination_id' => 'required|integer',
            'admission_university_id' => 'required|integer',
            'admission_fac_uni_id' => 'required|integer',
            'admission_fac_uni_major_id' => 'required|integer',
            'admission_department_id' => 'required|integer'
        ];
    }
}
