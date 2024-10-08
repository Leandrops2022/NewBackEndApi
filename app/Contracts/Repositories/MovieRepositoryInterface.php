<?php

namespace App\Contracts\Repositories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface MovieRepositoryInterface
{
    public function fetchMovie($slug): Movie;

    public function fetchMoviesByIds(array $ids): Collection;

    public function fetchMovieHighlights(): Collection;

    public function fetchMoviesByName($movieName): LengthAwarePaginator;
}
