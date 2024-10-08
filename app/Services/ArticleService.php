<?php

namespace App\Services;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Contracts\Services\ArticleServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService implements ArticleServiceInterface
{
    public function __construct(
        protected ArticleRepositoryInterface $articleRepository,
    ) {}

    public function getArticleAndHighlights($slug): array
    {
        $article    = $this->articleRepository->fetchArticle($slug);
        $highlights = $this->articleRepository->fetchArticleHighlights();

        $content = [
            'imgSrc'  => $article->imagem_capa,
            'imgAlt'  => $article->alt_capa,
            'title'   => $article->titulo,
            'content' => $article->texto,
            'trailer' => $article->trailer,
        ];

        $data = [
            'content'    => $content,
            'highlights' => $highlights,
        ];

        return $data;
    }

    public function getAllArticles(): LengthAwarePaginator
    {
        $articles = $this->articleRepository->fetchAllArticles();

        return $articles;
    }
}
