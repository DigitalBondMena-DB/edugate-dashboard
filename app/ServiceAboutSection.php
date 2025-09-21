<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceAboutSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'en_title',
        'ar_title',
        'en_text',
        'ar_text',
        ];
}
