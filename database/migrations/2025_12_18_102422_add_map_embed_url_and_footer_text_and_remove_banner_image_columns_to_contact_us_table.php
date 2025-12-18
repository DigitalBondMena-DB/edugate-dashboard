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
        Schema::table('contact_us', function (Blueprint $table) {
            $table->string('map_embed')->nullable();
            $table->text('ar_footer_text')->nullable();
            $table->text('en_footer_text')->nullable();
            $table->dropColumn('banner_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn('map_embed');
            $table->dropColumn('ar_footer_text');
            $table->dropColumn('en_footer_text');
            $table->string('banner_image')->nullable();
        });
    }
};
