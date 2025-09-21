<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewArticle extends Model
{
    use HasFactory;
    protected $fillable = [
        'en_title', 
        'ar_title', 
        'en_text',
        'ar_text' ,
        'en_slug' , 
        'ar_slug', 
        'main_image',
        'new_article_sub_catrgory_id' ,
        
        'article_counter',
        'article_date',
        
        'en_tag_title',
        'ar_tag_title',
        
        'schedule_date',
        'schedule_time',

        'en_tag_desc',
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
