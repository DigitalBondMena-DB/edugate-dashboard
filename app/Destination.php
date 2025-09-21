<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_slug', 'ar_slug', 'en_about_the_destination', 'ar_about_the_destination', 'flag', 'featured_image', 'banner_image'];

    public function getRouteKeyName() {
        if(app()->getLocale() == 'en') {
            return 'en_slug';
        } else {
            return 'ar_slug';
        }
    }

    public function universities() {
        return $this->hasMany(University::class);
    }
}
