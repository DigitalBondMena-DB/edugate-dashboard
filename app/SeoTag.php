<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeoTag extends Model
{
    use HasFactory;
    protected $fillable = ['en_tag_title', 'ar_tag_title', 'en_tag_paragraph', 'ar_tag_paragraph', 'tag_type', 'active'];
}
