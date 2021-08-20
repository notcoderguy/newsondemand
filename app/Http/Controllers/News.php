<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;

class News extends Controller
{
    # NewsOnDemand Home Page
    function index() {
        $mongo = new Mongo;
        $connection = $mongo -> newsondemand -> articles;
        $result = $connection -> find( [],
        [
            'limit' => 21,
            'sort' => ['pop' => -1],
        ]) -> toArray();
        return view('home') -> with('data', $result);
    }

    # NewsOnDemand All Articles
    function all() {
        $mongo = new Mongo;
        $connection = $mongo -> newsondemand -> articles;
        $result = $connection -> find() -> toArray();
        return view('all') -> with('data', $result);
    }

    # NewsOnDemand Single Article
    function article() {
        $mongo = new Mongo;
        $current_url = url() -> current();
        $link_url = ltrim(trim(strstr($current_url, 'article/'), 'article'), '/');
        $connection = $mongo -> newsondemand -> articles;
        $result = $connection -> findOne(['link' => $link_url]);
        $related_result = $connection -> find(
            [
                'category' => $result['category'],
            ],
            [
                'limit' => 4,
            ]);
        return view('article') -> with(['data' => $result, 'related_data' => $related_result]);
    }

    # NewsOnDemand Categories Page
    function categories($name) {
        $mongo = new Mongo;
        $connection = $mongo -> newsondemand -> articles;
        $result = $connection -> find( 
        [
            'category' => $name,
        ],
        [
            // 'limit' => 21,
            // 'sort' => ['pop' => -1],
        ]) -> toArray();
        // return $result;
        return view('categories') -> with(['data' => $result, 'category' => $name]);
    }    
}
