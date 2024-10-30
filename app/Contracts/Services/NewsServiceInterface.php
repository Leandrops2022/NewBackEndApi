<?php

namespace App\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface NewsServiceInterface
{
    public function getNewsAndHighlights($slug): array;

    public function getAllNews(): LengthAwarePaginator;
}
