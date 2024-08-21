<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleHighlights;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $data = Article::where('slug', $slug)->firstOrFail();

        return response()->json($data);
    }

    public function highlights()
    {
        $suggestions = ArticleHighlights::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }
}
