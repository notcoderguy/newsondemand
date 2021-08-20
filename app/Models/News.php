<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class News extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'articles';

    protected $fillable = [
        'link', 'twitter_title','twitter_desc', 'twitter_img', 'keyword', 'title', 'short_desc', 'img_placeholder', 'article_img', 'date', 'story_highlights', 'article', 'language', 'publisher', 'category'
    ];
}
