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
        Schema::create('why_us', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->timestamps();
        });
        Schema::create('why_us_fields', function (Blueprint $table) {
            $table->id();
            $table->string('field_ar');
            $table->string('field_en'); 
            $table->enum('active', ['activated', 'deactivated'])->default('activated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_us');
        Schema::dropIfExists('why_us_fields');
    }
};
