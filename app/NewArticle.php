<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewArticle extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_title',
        'ar_text' ,
        'ar_slug',
        'main_image',
        'new_article_sub_catrgory_id' ,

        'article_counter',
        'article_date',

        'ar_tag_title',

        'schedule_date',
        'schedule_time',

        'ar_tag_desc',
        'blog_script' ,
        'blog_second_script',
        'status'
    ];

    public function sub_category_data() {
        return $this->belongsTo(NewArticleSubCatrgory::class);
    }

    public function article_images(){
        return $this->hasMany(NewArticleImage::class);
    }
}
