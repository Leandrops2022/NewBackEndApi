<?php

namespace App\Repositories;

use App\Contracts\Repositories\TinyListRepositoryInterface;
use App\Models\TinyList;
use App\Models\TinyListHighlight;
use App\Models\TinyListHighlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TinyListRepository implements TinyListRepositoryInterface
{
    public function fetchTinyList($slug): TinyList
    {
        $tinyList = TinyList::where('slug', $slug)->firstOrFail(['imagem_capa', 'alt_imagem_capa', 'titulo', 'texto', 'filmes_ids']);

        return $tinyList;
    }

    public function fetchAllTinyLists(): LengthAwarePaginator
    {
        $tinyLists = TinyList::select('imagem_capa as capa', 'alt_imagem_capa', 'titulo', 'summary', 'tag', 'rota', 'slug')->orderBy('created_at')->paginate(10);

        return $tinyLists;
    }

    /**
     * @return Collection<int, TinyListHighlights>
     */
    public function fetchTinyListHighlights(): Collection
    {
        $highlights = TinyListHighlight::inRandomOrder()->limit(4)->get();

        return $highlights;
    }
}
