<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Main extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_section_first_image',
        
        'en_first_section_first_title',
        'ar_first_section_first_title',
        'en_first_section_first_paragraph',
        'ar_first_section_first_paragraph',

        'first_section_second_image',

        'en_first_section_second_title',
        'ar_first_section_second_title',
        'en_first_section_second_paragraph',
        'ar_first_section_second_paragraph',

        'first_section_third_image',

        'en_first_section_third_title',
        'ar_first_section_third_title',
        'en_first_section_third_paragraph',
        'ar_first_section_third_paragraph',

        'en_application_process_text',
        'ar_application_process_text',
        'en_application_process_title',
        'ar_application_process_title',

        'en_application_process_step_one_title',
        'ar_application_process_step_one_title',
        'en_application_process_step_one_text',
        'ar_application_process_step_one_text',
        'en_application_process_step_one_paragraph',
        'ar_application_process_step_one_paragraph',

        'en_application_process_step_two_title',
        'ar_application_process_step_two_title',
        'en_application_process_step_two_text',
        'ar_application_process_step_two_text',
        'en_application_process_step_two_paragraph',
        'ar_application_process_step_two_paragraph',

        'en_application_process_step_three_title',
        'ar_application_process_step_three_title',
        'en_application_process_step_three_text',
        'ar_application_process_step_three_text',
        'en_application_process_step_three_paragraph',
        'ar_application_process_step_three_paragraph',

        'en_application_process_step_four_title',
        'ar_application_process_step_four_title',
        'en_application_process_step_four_text',
        'ar_application_process_step_four_text',
        'en_application_process_step_four_paragraph',
        'ar_application_process_step_four_paragraph',

        'en_application_process_step_five_title',
        'ar_application_process_step_five_title',
        'en_application_process_step_five_text',
        'ar_application_process_step_five_text',
        'en_application_process_step_five_paragraph',
        'ar_application_process_step_five_paragraph',

        'en_last_section_first_header',
        'ar_last_section_first_header',
        'en_last_section_first_title',
        'ar_last_section_first_title',
        'en_last_section_second_title',
        'ar_last_section_second_title',

        'last_section_image',

        'en_last_section_image_header',
        'ar_last_section_image_header',
        'en_last_section_image_text',
        'ar_last_section_image_text',

        'en_last_section_main_text',
        'ar_last_section_main_text',

        'en_last_section_main_paragraph',
        'ar_last_section_main_paragraph',

        'en_last_section_list_item_first_text',
        'ar_last_section_list_item_first_text',

        'en_last_section_list_item_second_text',
        'ar_last_section_list_item_second_text',

        'en_last_section_list_item_third_text',
        'ar_last_section_list_item_third_text',

        'en_last_section_list_item_fourth_text',
        'ar_last_section_list_item_fourth_text',

        'en_last_section_list_item_five_text',
        'ar_last_section_list_item_five_text',

        'en_header_title',
        'ar_header_title',
        'en_header_text',
        'ar_header_text',

    ];
}
