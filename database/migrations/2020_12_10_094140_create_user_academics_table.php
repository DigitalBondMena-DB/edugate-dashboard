<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_academics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('degree_name');
            $table->integer('degree_year');
            $table->string('degree_country');
            $table->string('degree_image');
            $table->string('school_name')->nullable();
            $table->string('university_name')->nullable();
            $table->string('faculty_name')->nullable();
            $table->string('department_name')->nullable();
            $table->bigInteger('user_id')->unsigned();

            $table->string('gpa_precentage')->nullable();
            $table->string('education_system')->nullable();
            
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
        Schema::dropIfExists('user_academics');
    }
}
