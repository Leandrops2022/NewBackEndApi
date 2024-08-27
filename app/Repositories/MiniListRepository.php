<?php

namespace App\Repositories;

use App\Contracts\Repositories\MiniListRepositoryInterface;
use App\Models\MiniList;
use App\Models\MiniListHighlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MiniListRepository implements MiniListRepositoryInterface
{
    public function getMiniList($slug): MiniList
    {
        $minilist = MiniList::where('slug', $slug)->firstOrFail(['imagem_capa', 'alt_imagem_capa', 'titulo', 'texto', 'filmes_ids']);

        return $minilist;

    }

    public function getAllMiniLists(): LengthAwarePaginator
    {
        $highlights = MiniListHighlights::paginate(10);
        return $highlights;
    }

    /**
     * @return Collection<int, MiniListHighlights>
     */
    public function getMiniListHighlights(): Collection
    {
        $highlights = MiniListHighlights::inRandomOrder()->limit(4)->get();

        return $highlights;

    }

}
