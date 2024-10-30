<?php

namespace App\Repositories;

use App\Contracts\Repositories\SiteRepositoryInterface;
use App\Models\BestMoviesOfLastYear;
use App\Models\GeneralHighlights;
use App\Models\Top100Highlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class SiteRepository implements SiteRepositoryInterface
{
    public function fetchHomepageHighlights(): Collection
    {
        return GeneralHighlights::inRandomOrder()->limit(8)->get();
    }

    public function fetchTopMoviesFromLastYear(): LengthAwarePaginator
    {
        //this is necessary because of hosting service recent changes to mysql
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        return BestMoviesOfLastYear::select('titulo_portugues', 'rank', 'poster', 'duracao', 'ano_lancamento', 'nota', 'tagline', 'slug', 'genero')
            ->orderBy('rank', 'desc')
            ->paginate(10);
    }

    public function fetchAutoCompleteSuggestions($query): array
    {
        return DB::table(DB::raw("(
            SELECT filmes.titulo_portugues AS nome, rota_nova as rota, slug, tag
            FROM filmes
            WHERE titulo_portugues LIKE ? AND titulo_portugues NOT REGEXP '^[^a-zA-Z0-9]'
            UNION
            SELECT nome, rota_nova as rota, slug, tag
            FROM atores
            WHERE nome LIKE ? AND nome NOT REGEXP '^[^a-zA-Z0-9]'
        ) AS combined"))
            ->setBindings([$query, $query])
            ->limit(10)
            ->get(['nome', 'rota', 'slug', 'tag'])
            ->toArray();
    }

    public function fetchSearchData(string $query): LengthAwarePaginator
    {
        return DB::table(DB::raw("(
            SELECT filmes.poster as imagem, filmes.titulo_portugues AS nome, filmes.ano_lancamento as data, rota_nova as rota, slug, tag
            FROM filmes
            WHERE titulo_portugues LIKE ? AND titulo_portugues NOT REGEXP '^[^a-zA-Z0-9]'
            UNION
            SELECT imagem, nome, nascimento as data, rota_nova as rota, slug, tag
            FROM atores
            WHERE nome LIKE ? AND nome NOT REGEXP '^[^a-zA-Z0-9]'
        ) AS combined"))
            ->setBindings([$query, $query])
            ->paginate(15);
    }
}
