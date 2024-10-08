<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{
    public function fetchArticle($slug): Article;

    public function fetchAllArticles(): LengthAwarePaginator;

    public function fetchArticleHighlights(): Collection;
}
