<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_slug', 'ar_slug', 'featured_image', 'banner_image' , 'special_id'];

    public function getRouteKeyName() {
        if(app()->getLocale() == 'en') {
            return 'en_slug';
        } else {
            return 'ar_slug';
        }
    }
    
    public function universities() {
        return $this->belongsToMany(University::class, 'faculty_university')->using(FacultyUniversity::class)->withPivot('id', 'logo');
    }

    public function departments() {
        return $this->hasMany(Department::class);
    }
}
