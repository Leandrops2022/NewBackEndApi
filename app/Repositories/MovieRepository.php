<?php

namespace App\Repositories;

use App\Contracts\Repositories\MovieRepositoryInterface;
use App\Models\Movie;
use App\Models\Top100Highlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieRepository implements MovieRepositoryInterface
{
    public function fetchMovie($slug): Movie
    {
        $movie = Movie::with('movieVideos')->where('slug', $slug)->firstOrFail();

        return $movie;
    }

    public function fetchMoviesByIds(array $ids): Collection
    {
        return Movie::whereIn('id', $ids)->get();
    }

    public function fetchMovieHighlights(): Collection
    {
        $highLights = Top100Highlights::inRandomOrder()->limit(4)->get();

        return $highLights;
    }

    public function fetchMoviesByName($movieName): LengthAwarePaginator
    {
        $movies = Movie::where('titulo_portugues', 'like', '%' . $movieName . '%')->paginate(10);

        return $movies;
    }
}
