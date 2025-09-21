<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacultyMajorUniversity extends Pivot
{
    use HasFactory;
    protected $table = 'faculty_major_university';

    public function departments() {
        return $this->belongsToMany(Department::class, 'faculty_major_department_university', 'faculty_major_university_id', 'department_id');
    }

    public function major() {
        return $this->belongsTo(Major::class);
    }

    public function facultyUniversity() {
        return $this->belongsTo(FacultyUniversity::class, 'faculty_university_id', 'id');
    }
}
