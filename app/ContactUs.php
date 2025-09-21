<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'en_address', 'ar_address', 'phone', 
    'facebook', 
    'twitter', 
    'instagram',
    
    'snapchat' , 
    'linkedin' , 
    'tiktok' ,
    
    'banner_image'];
}
