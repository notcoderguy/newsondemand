<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $news_data = [
        'title',
        'published',
        'image',
        'highlight',
        'article',
        'keyword',
        'twitter_title',
        'twitter_description',
        'url',
        'category',
        'publisher',
    ];
}
