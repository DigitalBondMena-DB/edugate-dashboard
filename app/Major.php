<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name'];

    public function faculty_major_universities() {
        return $this->belongsToMany(FacultyUniversity::class, 'faculty_major_university', 'major_id', 'faculty_university_id')->using(FacultyMajorUniversity::class)->withPivot('id');
    }
}
