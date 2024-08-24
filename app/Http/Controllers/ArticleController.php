<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    public function __construct(public ArticleRepositoryInterface $repository) {}

    public function index()
    {
        return response()->json($this->repository->getAllArticles());
    }

    public function show($slug)
    {
        $data = $this->repository->getArticleAndHighlights($slug);

        return response()->json($data, 200);
    }

    public function highlights()
    {
        return response()->json($this->repository->getArticleHighlights());
    }
}
