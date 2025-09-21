<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('nationality');
            $table->string('nation');
            $table->string('address');
            $table->string('area');
            $table->string('degree_needed');
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('user_personals');
    }
}
