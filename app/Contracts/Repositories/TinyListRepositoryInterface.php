<?php

namespace App\Contracts\Repositories;

use App\Models\TinyList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TinyListRepositoryInterface
{
    public function fetchTinyList($slug): TinyList;

    public function fetchAllTinyLists(): LengthAwarePaginator;

    public function fetchTinyListHighlights(): Collection;
}
