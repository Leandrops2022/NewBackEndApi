<?php

namespace App\Repositories;

use App\Contracts\Repositories\NewsRepositoryInterface;

use App\Models\News;
use App\Models\NewsHighlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class NewsRepository implements NewsRepositoryInterface
{
    public function fetchNews($slug): News
    {
        //this is necessary because of hosting service recent changes to mysql
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $news = News::where('slug', $slug)->firstOrFail(['imagem_capa', 'alt_capa', 'titulo', 'texto', 'created_at']);

        return $news;
    }

    public function fetchAllNews(): LengthAwarePaginator
    {
        //this is necessary because of hosting service recent changes to mysql
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        return News::select('imagem_capa as capa', 'alt_capa', 'titulo', 'summary', 'trailer', 'tag', 'rota', 'slug')->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * @return Collection<int, NewsHighlights>
     */
    public function fetchNewsHighlights(): Collection
    {
        $highlights = NewsHighlights::inRandomOrder()->limit(4)->get();

        return $highlights;
    }
}
