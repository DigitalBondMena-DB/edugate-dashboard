<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('destination');
            $table->integer('university');
            $table->integer('faculty');
            $table->integer('major')->nullable();
            $table->integer('department')->nullable();
            $table->string('degree_needed');
            $table->boolean('money_received')->default(0);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('academic_guide_id')->unsigned()->nullable();
            $table->integer('day')->nullable();
            $table->string('month')->nullable();
            $table->integer('year')->nullable();
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
        Schema::dropIfExists('admission_forms');
    }
}
