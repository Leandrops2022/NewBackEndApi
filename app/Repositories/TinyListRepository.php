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
    public function getTinyList($slug): TinyList
    {
        $tinyList = TinyList::where('slug', $slug)->firstOrFail(['imagem_capa', 'alt_imagem_capa', 'titulo', 'texto', 'filmes_ids']);

        return $tinyList;

    }

    public function getAllTinyLists(): LengthAwarePaginator
    {
        $tinyLists = TinyList::paginate(10);

        return $tinyLists;
    }

    /**
     * @return Collection<int, TinyListHighlights>
     */
    public function getTinyListHighlights(): Collection
    {
        $highlights = TinyListHighlight::inRandomOrder()->limit(4)->get();

        return $highlights;

    }
}
