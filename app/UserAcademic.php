<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserAcademic extends Model
{
    use HasFactory;
    protected $fillable = ['degree_name', 'degree_year', 'degree_country', 'degree_image', 'school_name', 'gpa_precentage', 'education_system', 'university_name', 'faculty_name', 'department_name', 'master_name', 'user_id'];

    // protected $appends = ['day', 'month', 'year'];

    // public function getDayAttribute() {
    //     return $this->created_at->format('d');
    // }

    // public function getMonthAttribute() {
    //     return $this->created_at->format('F');
    // }

    // public function getYearAttribute() {
    //     return $this->created_at->format('Y');
    // }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
