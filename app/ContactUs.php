<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'en_address', 'ar_address', 'phones',
    'facebook',
    'twitter',
    'instagram',

    'snapchat' ,
    'linkedin' ,
    'tiktok' ,
    'whatsapp_number',
    'map_url',
    'banner_image'];
    protected $casts = [
        'phones' => 'array',
    ];
}
