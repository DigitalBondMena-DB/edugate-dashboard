<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = ['en_title', 'ar_title', 'en_paragraph', 'ar_paragraph', 'image', 'active'];
}
