<?php

namespace App\Interfaces;

use App\Models\MiniList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface MiniListRepositoryInterface
{
    public function getMiniList($slug): MiniList;

    public function getAllMiniLists(): LengthAwarePaginator;

    public function getMiniListHighlights(): Collection;

    // public function getMiniListAndHighlights($slug): array;
}
