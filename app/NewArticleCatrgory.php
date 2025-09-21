<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewArticleCatrgory extends Model
{
    use HasFactory;
    protected $fillable = [
        'en_title', 
        'ar_title', 
        'en_slug' , 
        'ar_slug', 
    ];


    public function sub_category_article() {
        return $this->hasMany(NewArticleSubCatrgory::class);
    }
}
