<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('study_abroad_form', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality');
            $table->string('country');
            $table->string('degree')->nullable();
            $table->string('academic_level')->nullable();
            $table->string('gpa')->nullable();
            $table->string('specialization')->nullable();
            $table->boolean('seen')->default(false);
            $table->timestamps();
            
            $table->index('seen');
            $table->index('created_at');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_abroad_form');
    }
};
