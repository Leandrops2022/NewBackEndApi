<?php

namespace App\Http\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
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
        return Article::orderBy('created_at')->paginate(10);
    }

    /**
     * @return Collection<int, ArticleHighlights>
     */
    public function getArticleHighlights(): Collection
    {
        $highlights = ArticleHighlights::inRandomOrder()->limit(4)->get();

        return $highlights;

    }

    public function getArticleAndHighlights($slug): array
    {
        $article    = $this->getArticle($slug);
        $highlights = $this->getArticleHighlights();

        $articleData = [
            'imgSrc'  => $article->imagem_capa,
            'imgAlt'  => $article->alt_capa,
            'title'   => $article->titulo,
            'content' => $article->texto,
            'trailer' => $article->trailer,
        ];

        $data = [
            'content'       => $articleData,
            'highlights'    => $highlights,
        ];

        return $data;
    }
}
