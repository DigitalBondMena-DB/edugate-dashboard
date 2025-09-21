<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_slug', 'ar_slug', 'en_specialization_vision', 'ar_specialization_vision', 'en_specialization_mission', 'ar_specialization_mission', 'foundation_year', 'featured_image', 'banner_image', 'department_id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
