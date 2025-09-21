<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            
            $table->string('passport')->nullable();
            $table->string('secondary_certificate')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('diploma')->nullable();
            $table->string('authorization')->nullable();
            $table->string('image')->nullable();
            $table->string('capabilities')->nullable();
            $table->string('other')->nullable();
            
            $table->integer('day')->nullable();
            $table->string('month')->nullable();
            $table->integer('year')->nullable();
            
            $table->integer('delegate_day')->nullable();
            $table->string('delegate_month')->nullable();
            $table->integer('delegate_year')->nullable();
            
            $table->string('steps')->nullable();
            $table->string('delegate_status')->nullable();
            $table->string('last_document')->nullable();
            $table->string('comment')->nullable();
            
            
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
        Schema::dropIfExists('file_movements');
    }
}
