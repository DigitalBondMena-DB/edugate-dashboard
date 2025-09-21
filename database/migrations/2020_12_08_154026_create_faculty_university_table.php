<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyUniversityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_university', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('university_id');
            $table->bigInteger('faculty_id');
            $table->text('en_faculty_vision')->nullable();
            $table->text('ar_faculty_vision')->nullable();
            $table->text('en_faculty_mission')->nullable();
            $table->text('ar_faculty_mission')->nullable();
            $table->text('en_address')->nullable();
            $table->text('ar_address')->nullable();
            $table->integer('foundation_year')->nullable();
            $table->string('faculty_phone')->nullable();
            $table->string('faculty_site')->nullable();
            $table->string('logo')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->double('percentage', 2)->nullable();
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
        Schema::dropIfExists('faculty_university');
    }
}
