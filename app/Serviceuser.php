<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Serviceuser extends Model
{
    use HasFactory;
    protected $fillable = [
        'en_name', 
        'ar_name', 
        'en_title',
        'ar_title',
        'en_first_text',
        'ar_first_text',
        'image',
        'active'
        ];
}
