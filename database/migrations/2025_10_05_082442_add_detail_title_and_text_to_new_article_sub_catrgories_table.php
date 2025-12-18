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
        Schema::table('new_article_sub_catrgories', function (Blueprint $table) {
            $table->string('ar_description')->nullable();
            $table->string('en_description')->nullable();
            // $table->string('ar_detail_title')->nullable();
            // $table->string('en_detail_title')->nullable();
            $table->text('ar_detail_text')->nullable();
            $table->text('en_detail_text')->nullable();
            $table->string('banner_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_article_sub_catrgories', function (Blueprint $table) {
            $table->dropColumn('ar_description');
            $table->dropColumn('en_description');
            $table->dropColumn('ar_detail_title');
            $table->dropColumn('en_detail_title');
            $table->dropColumn('ar_detail_text');
            $table->dropColumn('en_detail_text');
            $table->dropColumn('banner_image');
        });
    }
};
