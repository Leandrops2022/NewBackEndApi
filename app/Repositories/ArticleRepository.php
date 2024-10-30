<?php

namespace App\Repositories;

use App\Contracts\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use App\Models\ArticleHighlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function fetchArticle($slug): Article
    {
        //this is necessary because of hosting service recent changes to mysql
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $article = Article::where('slug', $slug)->firstOrFail(['imagem_capa', 'alt_capa', 'titulo', 'texto', 'trailer']);

        return $article;
    }

    public function fetchAllArticles(): LengthAwarePaginator
    {
        //this is necessary because of hosting service recent changes to mysql
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        return Article::select('imagem_capa as capa', 'alt_capa', 'titulo', 'summary as texto', 'trailer', 'tag', 'rota', 'slug')->orderBy('created_at')->paginate(10);
    }

    /**
     * @return Collection<int, ArticleHighlights>
     */
    public function fetchArticleHighlights(): Collection
    {
        $highlights = ArticleHighlights::inRandomOrder()->limit(4)->get();

        return $highlights;
    }
}
