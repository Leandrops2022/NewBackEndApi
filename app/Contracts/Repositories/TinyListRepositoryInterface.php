<?php

namespace App\Contracts\Repositories;

use App\Models\TinyList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TinyListRepositoryInterface
{
    public function getTinyList($slug): TinyList;

    public function getAllTinyLists(): LengthAwarePaginator;

    public function getTinyListHighlights(): Collection;
}
