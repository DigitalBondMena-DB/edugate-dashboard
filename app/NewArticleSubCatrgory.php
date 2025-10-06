<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewArticleSubCatrgory extends Model
{
    use HasFactory;
    protected $fillable = [
        'en_title', 
        'ar_title', 
        'en_slug' , 
        'ar_slug', 
        'en_tag_title',
        'ar_tag_title',
        'en_tag_description',
        'ar_tag_description',
        'new_article_catrgory_id',
        'active',
        'banner_image',
        'ar_description',
        'en_description',
        'ar_detail_title',
        'en_detail_title',
        'ar_detail_text',
        'en_detail_text',
    ];


    public function category_article() {
        return $this->belongsTo(NewArticleCatrgory::class);
    }

    public function article_data() {
        return $this->hasMany(NewArticle::class);
    }
}
