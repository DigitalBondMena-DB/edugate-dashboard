<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewArticleImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'new_article_id' ,
        'image_url'
    ];

    public function article_data() {
        return $this->belongsTo(NewArticle::class);
    }

}
