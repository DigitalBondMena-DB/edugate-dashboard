<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class University extends Model
{
    protected $guarded = [];

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function faculties(): BelongsToMany
    {
        return $this->belongsToMany(Faculty::class, 'faculty_university')
            ->using(FacultyUniversity::class);
    }

    public function facultyUniversities(): HasMany
    {
        return $this->hasMany(FacultyUniversity::class);
    }

    public function departments(): HasManyThrough
    {
        return $this->hasManyThrough(
            Department::class,
            FacultyUniversity::class,
            'university_id',
            'faculty_university_id',
            'id',
            'id'
        );
    }
}
