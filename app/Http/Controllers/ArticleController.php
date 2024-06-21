<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showArtigo($slug)
    {
        $data = Article::where('slug', $slug)->firstOrFail();

        return response()->json($data);
    }
}
