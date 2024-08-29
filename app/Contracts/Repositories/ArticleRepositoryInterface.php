<?php

namespace App\Contracts\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{
    public function getArticle($slug): Article;

    public function getAllArticles(): LengthAwarePaginator;

    public function getArticleHighlights(): Collection;
}
