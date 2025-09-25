<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUsField extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_ar',
        'field_en',
        'active',
    ];
}
