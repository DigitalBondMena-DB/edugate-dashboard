<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('event_categeries', function (Blueprint $table) {
            $table->text('ar_description')->nullable();
            $table->text('en_description')->nullable();
            $table->enum('active', ['activated', 'deactivated'])->default('activated');
        });

        Schema::table('event_gallaries', function (Blueprint $table) {
            $table->bigInteger('event_categery_id')->nullable();
        });

        DB::statement('
            UPDATE event_gallaries 
            SET event_categery_id = NULL 
            WHERE event_categery_id NOT IN (
                SELECT id FROM event_categeries
            ) AND event_categery_id IS NOT NULL
        ');
        Schema::table('event_gallaries', function (Blueprint $table) {
            $table->foreign('event_categery_id')
                  ->references('id')
                  ->on('event_categeries')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_categeries', function (Blueprint $table) {
            $table->dropColumn('ar_description');
            $table->dropColumn('en_description');
            $table->dropColumn('active');
        });
        
        Schema::table('event_gallaries', function (Blueprint $table) {
            $table->dropForeign(['event_categery_id']);
            $table->dropColumn('event_categery_id');
        });
    }
};