<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventGallary extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'event_categery_id'];

    
    
    public function event_details() {
        return $this->belongsTo(EventDetail::class);
    }

    public function event_categery() {
        return $this->belongsTo(EventCategery::class, 'event_categery_id ');
    }

   
}
