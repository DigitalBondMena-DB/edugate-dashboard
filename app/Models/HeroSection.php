<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'first_description_ar',
        'first_description_en',
        'second_description_ar',
        'second_description_en',
        'image',
    ];
}
