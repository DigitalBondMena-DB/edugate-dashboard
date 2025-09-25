<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventCategery extends Model
{
    use HasFactory;
    protected $fillable = ['en_name', 'ar_name', 'ar_description', 'en_description', 'active'];

    

    public function event_details() {
        return $this->hasMany(EventDetail::class);
    }

    public function gallaries() {
        return $this->hasMany(EventGallary::class, 'event_categery_id');
    }
}
