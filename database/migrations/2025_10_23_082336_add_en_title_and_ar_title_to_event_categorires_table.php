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
        Schema::table('event_categeries', function (Blueprint $table) {
            $table->string('en_title')->nullable();
            $table->string('ar_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_categeries', function (Blueprint $table) {
            $table->dropColumn('en_title');
            $table->dropColumn('ar_title');
        });
    }
};
