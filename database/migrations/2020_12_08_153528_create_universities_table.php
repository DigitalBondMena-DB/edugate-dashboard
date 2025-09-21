<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('en_slug');
            $table->string('ar_slug');
            $table->text('en_about_the_university');
            $table->text('ar_about_the_university');
            $table->text('en_university_vision');
            $table->text('ar_university_vision');
            $table->text('en_university_mission');
            $table->text('ar_university_mission');
            $table->integer('foundation_year');
            $table->string('en_university_type');
            $table->string('ar_university_type');
            $table->string('university_site');
            $table->string('en_governorate');
            $table->string('ar_governorate');
            $table->string('en_address');
            $table->string('ar_address');
            $table->string('logo');
            $table->string('featured_image');
            $table->string('banner_image');
            $table->bigInteger('destination_id')->unsigned();
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
        Schema::dropIfExists('universities');
    }
}
