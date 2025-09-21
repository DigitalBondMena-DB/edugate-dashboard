<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventCategery extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_slug', 'ar_slug', 'video_link' , 'featured_image', 'banner_image' , 'event_year' ];

    public function getRouteKeyName() {
        if(app()->getLocale() == 'en') {
            return 'en_slug';
        } else {
            return 'ar_slug';
        }
    }
    

    public function event_details() {
        return $this->hasMany(EventDetail::class);
    }
}
