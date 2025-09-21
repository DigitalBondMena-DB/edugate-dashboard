<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventDetail extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'en_slug' , 'ar_slug' , 'en_text', 'ar_text','featured_image', 'banner_image' , 'event_year' , 'event_category_id'];

    
    
    public function event_categery() {
        return $this->belongsTo(EventCategery::class);
    }

    public function event_gallary() {
        return $this->hasMany(EventGallary::class);
    }
}
