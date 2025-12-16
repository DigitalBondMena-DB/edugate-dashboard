<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    protected $guarded = [];

    public function universities(): BelongsToMany
    {
        return $this->belongsToMany(University::class, 'faculty_university')
            ->using(FacultyUniversity::class);
    }

    public function facultyUniversities(): HasMany
    {
        return $this->hasMany(FacultyUniversity::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
