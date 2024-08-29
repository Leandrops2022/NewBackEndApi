<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ArticleServiceInterface;

class ArticleController extends Controller
{
    public function __construct(protected ArticleServiceInterface $articleService) {}

    public function index()
    {
        return response()->json($this->articleService->getAllArticles());
    }

    public function show($slug)
    {
        $data = $this->articleService->getArticleAndHighlights($slug);

        return response()->json($data, 200);
    }
}
