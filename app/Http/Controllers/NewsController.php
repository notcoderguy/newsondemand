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
        $search = $request->input('search');

        $data = News::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        
        return view('search') ->  with(['data' => $data, 'search' => $search]);
    }
}
