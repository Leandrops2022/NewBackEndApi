<?php

namespace App\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface MovieServiceInterface
{
    public function getMovieBySlugAndHighlights($slug): array;

    public function searchMovie($movieName): LengthAwarePaginator;
}
