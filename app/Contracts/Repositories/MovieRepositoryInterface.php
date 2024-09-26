<?php

namespace App\Contracts\Repositories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface MovieRepositoryInterface
{
    public function getMovie($slug): Movie;

    public function getMoviesByIds(array $ids): Collection;

    public function getMovieHighlights(): Collection;

    public function getMoviesByName($movieName): LengthAwarePaginator;
}
