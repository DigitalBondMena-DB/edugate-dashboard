<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['en_story', 'ar_story', 'image', 'en_mission', 'ar_mission', 'en_vision', 'ar_vision'];
}
