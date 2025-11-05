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
        Schema::create('en_blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('new_article_sub_catrgory_id');
            $table->string('title')->nullable();
            $table->longText('text')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('counter')->default(0);
            $table->date('date')->nullable();
            $table->integer('status')->default(1);
            $table->text('script_1')->nullable();
            $table->text('script_2')->nullable();
            $table->date('schedule_date')->nullable();
            $table->time('schedule_time')->nullable();
            $table->timestamps();
            $table->foreign('new_article_sub_catrgory_id')
                ->references('id')
                ->on('new_article_sub_catrgories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('en_blogs');
    }
};
