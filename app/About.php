<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['en_story', 'ar_story', 'story_image','en_achevement_title' ,'ar_achevement_title' , 'en_achevement_text' ,'ar_achevement_text' , 'en_mission', 'ar_mission', 'mission_image' ,'en_vision', 'ar_vision', 'vision_image' , 'banner_image' , 'en_goal',
        'ar_goal'];
}
