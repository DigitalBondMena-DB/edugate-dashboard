<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_text','ar_text' ,'image', 'active', 'ar_job_title', 'en_job_title'];
}
