<?php

namespace App\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface TinyListServiceInterface
{
    public function getTinyListAndHighlights($slug): array;

    public function getAllTinyLists(): LengthAwarePaginator;
}
