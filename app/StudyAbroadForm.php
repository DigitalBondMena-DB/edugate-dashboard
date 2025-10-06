<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudyAbroadForm extends Model
{
    use HasFactory;
    protected $table = 'study_abroad_form';
    protected $fillable = ['seen'];

    protected $casts = [
        'seen' => 'boolean',
    ];
}
