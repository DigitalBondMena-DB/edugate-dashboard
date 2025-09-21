<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_slug', 'ar_slug', 'en_department_vision', 'ar_department_vision', 'en_department_mission', 'ar_department_mission', 'foundation_year', 'featured_image', 'banner_image'];

    public function faculty_major_department_universities() {
        return $this->belongsToMany(FacultyMajorUniversity::class, 'faculty_major_department_university', 'department_id', 'faculty_major_university_id');
    }

    public function specializations() {
        return $this->hasMany(Specialization::class);
    }
}
