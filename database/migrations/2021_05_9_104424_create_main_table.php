<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('first_section_first_image');
            $table->string('en_first_section_first_title');
            $table->string('ar_first_section_first_title');
            $table->string('en_first_section_first_paragraph');
            $table->string('ar_first_section_first_paragraph');

            $table->string('first_section_second_image');
            $table->string('en_first_section_second_title');
            $table->string('ar_first_section_second_title');
            $table->string('en_first_section_second_paragraph');
            $table->string('ar_first_section_second_paragraph');

            $table->string('first_section_third_image');
            $table->string('en_first_section_third_title');
            $table->string('ar_first_section_third_title');
            $table->string('en_first_section_third_paragraph');
            $table->string('ar_first_section_third_paragraph');

            $table->string('en_application_process_text');
            $table->string('ar_application_process_text');
            $table->string('en_application_process_title');
            $table->string('ar_application_process_title');

            $table->string('en_application_process_step_one_title');
            $table->string('ar_application_process_step_one_title');
            $table->string('en_application_process_step_one_text');
            $table->string('ar_application_process_step_one_text');
            $table->string('en_application_process_step_one_paragraph')->nullable();
            $table->string('ar_application_process_step_one_paragraph')->nullable();

            $table->string('en_application_process_step_two_title');
            $table->string('ar_application_process_step_two_title');
            $table->string('en_application_process_step_two_text');
            $table->string('ar_application_process_step_two_text');
            $table->string('en_application_process_step_two_paragraph')->nullable();
            $table->string('ar_application_process_step_two_paragraph')->nullable();

            $table->string('en_application_process_step_three_title');
            $table->string('ar_application_process_step_three_title');
            $table->string('en_application_process_step_three_text');
            $table->string('ar_application_process_step_three_text');
            $table->string('en_application_process_step_three_paragraph')->nullable();
            $table->string('ar_application_process_step_three_paragraph')->nullable();

            $table->string('en_application_process_step_four_title');
            $table->string('ar_application_process_step_four_title');
            $table->string('en_application_process_step_four_text');
            $table->string('ar_application_process_step_four_text');
            $table->string('en_application_process_step_four_paragraph')->nullable();
            $table->string('ar_application_process_step_four_paragraph')->nullable();

            $table->string('en_application_process_step_five_title');
            $table->string('ar_application_process_step_five_title');
            $table->string('en_application_process_step_five_text');
            $table->string('ar_application_process_step_five_text');
            $table->string('en_application_process_step_five_paragraph')->nullable();
            $table->string('ar_application_process_step_five_paragraph')->nullable();

            $table->string('en_last_section_first_header');
            $table->string('ar_last_section_first_header');
            $table->string('en_last_section_first_title');
            $table->string('ar_last_section_first_title');

            $table->string('en_last_section_second_title');
            $table->string('ar_last_section_second_title');

            $table->string('last_section_image');
            $table->string('en_last_section_image_header');
            $table->string('ar_last_section_image_header');
            $table->string('en_last_section_image_text');
            $table->string('ar_last_section_image_text');

            $table->string('en_last_section_main_text');
            $table->string('ar_last_section_main_text');

            $table->string('en_last_section_main_paragraph');
            $table->string('ar_last_section_main_paragraph');

            $table->string('en_last_section_list_item_first_text');
            $table->string('ar_last_section_list_item_first_text');

            $table->string('en_last_section_list_item_second_text');
            $table->string('ar_last_section_list_item_second_text');

            $table->string('en_last_section_list_item_third_text');
            $table->string('ar_last_section_list_item_third_text');

            $table->string('en_last_section_list_item_fourth_text');
            $table->string('ar_last_section_list_item_fourth_text');

            $table->string('en_last_section_list_item_five_text');
            $table->string('ar_last_section_list_item_five_text');

            $table->string('en_header_title');
            $table->string('ar_header_title');
            $table->string('en_header_text');
            $table->srting('ae_header_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main');
    }
}
