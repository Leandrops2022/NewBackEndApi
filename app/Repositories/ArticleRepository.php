<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use App\Models\ArticleHighlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getArticle($slug): Article
    {
        $article = Article::where('slug', $slug)->firstOrFail(['imagem_capa', 'alt_capa', 'titulo', 'texto', 'trailer']);

        return $article;

    }

    public function getAllArticles(): LengthAwarePaginator
    {
        return Article::select('imagem_capa', 'alt_capa', 'titulo', 'texto', 'trailer')->orderBy('created_at')->paginate(10);
    }

    /**
     * @return Collection<int, ArticleHighlights>
     */
    public function getArticleHighlights(): Collection
    {
        $highlights = ArticleHighlights::inRandomOrder()->limit(4)->get();

        return $highlights;

    }
}
