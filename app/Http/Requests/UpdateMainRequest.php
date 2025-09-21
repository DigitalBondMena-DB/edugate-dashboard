<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMainRequest extends FormRequest
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
            'first_section_first_image' => 'mimes:jpg,jpeg,png,svg',

            'en_first_section_first_title' => 'required',
            'ar_first_section_first_title' => 'required',
            'en_first_section_first_paragraph' => 'required',
            'ar_first_section_first_paragraph' => 'required',

            'first_section_second_image' => 'mimes:jpg,jpeg,png,svg',

            'en_first_section_second_title' => 'required',
            'ar_first_section_second_title' => 'required',
            'en_first_section_second_paragraph'=> 'required',
            'ar_first_section_second_paragraph'=> 'required',

            'first_section_third_image' => 'mimes:jpg,jpeg,png,svg',

            'en_first_section_third_title' => 'required',
            'ar_first_section_third_title' => 'required',
            'en_first_section_third_paragraph' => 'required',
            'ar_first_section_third_paragraph' => 'required',

            'en_application_process_text' => 'required',
            'ar_application_process_text' => 'required',
            'en_application_process_title' => 'required',
            'ar_application_process_title' => 'required',

            'en_application_process_step_one_title' => 'required',
            'ar_application_process_step_one_title' => 'required',
            'en_application_process_step_one_text' => 'required',
            'ar_application_process_step_one_text' => 'required',
            'en_application_process_step_one_paragraph' =>
            'required',
            'ar_application_process_step_one_paragraph' =>
            'required',

            'en_application_process_step_two_title' => 'required',
            'ar_application_process_step_two_title' => 'required',
            'en_application_process_step_two_text' => 'required',
            'ar_application_process_step_two_text' => 'required',
            'en_application_process_step_two_paragraph' =>
            'required',
            'ar_application_process_step_two_paragraph' =>
            'required',

            'en_application_process_step_three_title' => 'required',
            'ar_application_process_step_three_title' => 'required',
            'en_application_process_step_three_text' => 'required',
            'ar_application_process_step_three_text' => 'required',
            'en_application_process_step_three_paragraph' =>
            'required',
            'ar_application_process_step_three_paragraph' =>
            'required',

            'en_application_process_step_four_title' => 'required',
            'ar_application_process_step_four_title' => 'required',
            'en_application_process_step_four_text' => 'required',
            'ar_application_process_step_four_text' => 'required',
            'en_application_process_step_four_paragraph' =>
            'required',
            'ar_application_process_step_four_paragraph' =>
            'required',

            'en_application_process_step_five_title' => 'required',
            'ar_application_process_step_five_title' => 'required',
            'en_application_process_step_five_text' => 'required',
            'ar_application_process_step_five_text' => 'required',
            'en_application_process_step_five_paragraph' =>
            'required',
            'ar_application_process_step_five_paragraph' =>
            'required',

            'en_last_section_first_header' => 'required',
            'ar_last_section_first_header' => 'required',
            'en_last_section_first_title' => 'required',
            'ar_last_section_first_title' => 'required',
            'en_last_section_second_title' => 'required',
            'ar_last_section_second_title' => 'required',

            'last_section_image' =>'mimes:jpg,jpeg,png,svg',

            'en_last_section_image_header' => 'required',
            'ar_last_section_image_header' => 'required',
            'en_last_section_image_text' => 'required',
            'ar_last_section_image_text' => 'required',

            'en_last_section_main_text' => 'required',
            'ar_last_section_main_text' => 'required',

            'en_last_section_main_paragraph' => 'required',
            'ar_last_section_main_paragraph' => 'required',

            'en_last_section_list_item_first_text' => 'requried',
            'ar_last_section_list_item_first_text' => 'required',

            'en_last_section_list_item_second_text' => 'required',
            'ar_last_section_list_item_second_text' => 'required' ,

            'en_last_section_list_item_third_text' => 'required',
            'ar_last_section_list_item_third_text' => 'required',

            'en_last_section_list_item_fourth_text' => 'required',
            'ar_last_section_list_item_fourth_text' => 'required',

            'en_last_section_list_item_five_text' => 'required',
            'ar_last_section_list_item_five_text' => 'required',

            'en_header_title' => 'required',
            'ar_header_title' => 'required',
            'en_header_text' => 'required' ,
            'ar_header_text' => 'required',
        ];
    }
}
