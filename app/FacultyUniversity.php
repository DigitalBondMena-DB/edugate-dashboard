<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacultyUniversity extends Pivot
{
    use HasFactory;
    protected $table = 'faculty_university';

    protected $guarded = [];

    public function majors() {
        return $this->belongsToMany(Major::class, 'faculty_major_university', 'faculty_university_id', 'major_id')->using(FacultyMajorUniversity::class)->withPivot('id');
    }

    public function university() {
        return $this->belongsTo(University::class);
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
}
