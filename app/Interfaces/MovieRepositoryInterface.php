<?php

namespace App\Interfaces;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

interface MovieRepositoryInterface
{

    public function getMovie($slug): Movie;

    public function getMoviesByIds(array $ids): Collection;

    // public function getMovieHighlights(): Collection;

    // public function getMovieAndHighlights($slug): array;
}
