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
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                                'story_image',
                                'en_achevement_title',
                                'ar_achevement_title', 
                                'en_achevement_text', 
                                'ar_achevement_text', 
                                'mission_image', 
                                'vision_image', 
                                'banner_image', 
                                'en_goal', 
                                'ar_goal',
                                'en_vision',
                                'ar_vision',
                            ]);
        });
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('image')->after('ar_mission');
            $table->text('en_vision')->after('image');
            $table->text('ar_vision')->after('en_vision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('abouts', function (Blueprint $table) {
            if(Schema::hasColumn('abouts', 'image')) {
                $table->dropColumn('image');
            }
            if(Schema::hasColumn('abouts', 'en_vision')) {
                $table->dropColumn('en_vision');
            }
            if(Schema::hasColumn('abouts', 'ar_vision')) {
                $table->dropColumn('ar_vision');
            }
        });
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('story_image')->after('ar_mission');
            $table->string('en_achevement_title')->after('story_image');
            $table->string('ar_achevement_title')->after('en_achevement_title');
            $table->text('en_achevement_text')->after('ar_achevement_title');
            $table->text('ar_achevement_text')->after('en_achevement_text');
            $table->string('mission_image')->after('ar_achevement_text');
            $table->string('vision_image')->after('mission_image');
            $table->string('banner_image')->after('vision_image');
            $table->text('en_goal')->after('banner_image');
            $table->text('ar_goal')->after('en_goal');
            $table->text('en_vision')->after('ar_goal');
            $table->text('ar_vision')->after('en_vision');
        });
    }
};
