<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use PDO;

class NewsController extends Controller
{
    public function app(Request $request)
    {
        $data = News::orderBy('id', 'DESC')
                    ->paginate(12);
        
        if($request->ajax())
        {
            $view = view('article_block') -> with(['data' => $data]) -> render();
            return response()->json(['html' => $view]);
        }

        return view('app') -> with(['data' => $data]);
    }

    public function article($hashed)
    {
        $article_data = News::where('id', base64_decode($hashed))
                    ->get();

        return view('article') -> with(['article_data' => $article_data[0]]);
    }

    public function categories(Request $request)
    {
        $data = News::orderBy('id', 'DESC')
                    ->where('category', $request->category)
                    ->paginate(12);

        if($request->ajax())
        {
            $view = view('article_block') -> with(['data' => $data]) -> render();
            return response()->json(['html' => $view]);
        }

        return view('category') -> with(['data' => $data]);
    }

    public function search(Request $request)
    {   
        $search = $_GET['search'];

        $data = News::orderBy('id', 'DESC')
                    ->where('title', 'LIKE', "%{$search}%")
                    ->paginate(12);

        if($request->ajax())
        {
            $view = view('article_block') -> with(['data' => $data]) -> render();
            return response()->json(['html' => $view]);
        }
        
        return view('search') ->  with(['data' => $data, 'search' => $search]);
    }

    public function cdn_image($title, $timestamp, $image)
    {
        // Replace spaces with dashes
        $title_mod = preg_replace("/[^A-Za-z0-9 ]/", ' ', $title);
        $title_mod = preg_replace('/\s\s+/', ' ', $title_mod);
        $title_mod = preg_replace('/\s+/', '-', $title_mod);

        // Break up timestamp into date, month, and year
        $timestamp_mod = new \DateTime($timestamp);
        $year = $timestamp_mod->format('Y');
        $month = $timestamp_mod->format('m');
        $day = $timestamp_mod->format('d');

        // Get extension of image from url
        $extension = pathinfo($image, PATHINFO_EXTENSION);

        return "https://cdn.newsondemand.in/img/news/{$year}/{$month}/{$day}/{$title_mod}.{$extension}";
    }
}
