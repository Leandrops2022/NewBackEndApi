<?php

namespace App\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleServiceInterface
{
    public function getArticleAndHighlights($slug): array;

    public function getAllArticles(): LengthAwarePaginator;
}
