<?php

namespace App\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface MiniListServiceInterface
{
    public function getMiniListAndHighlights($slug): array;
    public function getAllMiniLists(): LengthAwarePaginator;
}
