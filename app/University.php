<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class University extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_slug', 'ar_slug', 'en_about_the_university', 'ar_about_the_university', 'en_university_vision', 'ar_university_vision', 'en_university_mission', 'ar_university_mission', 'foundation_year', 'en_university_type', 'ar_university_type', 'university_site', 'en_governorate', 'ar_governorate', 'en_address', 'ar_address', 'featured_image', 'logo', 'banner_image', 'destination_id'];

    public function getRouteKeyName() {
        if(app()->getLocale() == 'en') {
            return 'en_slug';
        } else {
            return 'ar_slug';
        }
    }
    
    public function destination() {
        return $this->belongsTo(Destination::class);
    }

    public function faculties() {
        return $this->belongsToMany(Faculty::class, 'faculty_university')->using(FacultyUniversity::class)->withPivot('id', 'logo');
    }
}
