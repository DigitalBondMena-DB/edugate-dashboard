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
        Schema::table('new_article_catrgories', function (Blueprint $table) {
            $table->enum('active', ['activated', 'deactivated'])->default('activated')->after('ar_slug');
        });
        Schema::table('new_article_sub_catrgories', function (Blueprint $table) {
            $table->enum('active', ['activated', 'deactivated'])->default('activated')->after('new_article_catrgory_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_article_catrgories', function (Blueprint $table) {
            $table->dropColumn('active');
        });
        Schema::table('new_article_sub_catrgories', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
