<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use PDO;

class MobileNewsController extends Controller
{
    public function app(Request $request)
    {
        $data = News::orderBy('id', 'DESC')
                    ->paginate(10);
        
        if($request->ajax())
        {
            $view = view('mobile.article_block') -> with(['data' => $data]) -> render();
            return response()->json(['html' => $view]);
        }

        return view('mobile.app') -> with(['year' => date("Y"), 'data' => $data]);
    }

    public function article($hashed)
    {
        $article_data = News::where('id', base64_decode($hashed))
                    ->get();

        return view('mobile.article') -> with(['year' => date("Y"), 'article_data' => $article_data[0]]);
    }

    public function categories()
    {

    }

    public function search(Request $request)
    {   
        $search = $request->input('search');
        
        $data = News::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('highlight', 'LIKE', "%{$search}%")
        ->get();
        
        return view('mobile.search') ->  with(['year' => date("Y"), 'data' => $data]);
    }
}
