<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('en_slug');
            $table->string('ar_slug');
            $table->text('en_specialization_vision')->nullable();
            $table->text('ar_specialization_vision')->nullable();
            $table->text('en_specialization_mission')->nullable();
            $table->text('ar_specialization_mission')->nullable();
            $table->integer('foundation_year')->nullable();
            $table->string('featured_image');
            $table->string('banner_image');
            $table->bigInteger('department_id')->unsigned();
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
        Schema::dropIfExists('specializations');
    }
}
