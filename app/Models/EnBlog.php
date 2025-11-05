<?php

namespace App\Models;

use App\NewArticleSubCatrgory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'new_article_sub_catrgory_id',
        'title',
        'text',
        'slug',
        'image',
        'meta_title',
        'meta_description',
        'counter',
        'date',
        'status',
        'script_1',
        'script_2',
        'schedule_date',
        'schedule_time',
    ];

    public function new_article_sub_catrgory()
    {
        return $this->belongsTo(NewArticleSubCatrgory::class);
    }
}
