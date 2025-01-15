<?php

namespace App\Services;

use App\Contracts\Repositories\MovieRepositoryInterface;
use App\Contracts\Services\MovieServiceInterface;
use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieService implements MovieServiceInterface
{
    public function __construct(private MovieRepositoryInterface $movieRepository) {}

    /**
     * Get movie by slug and highlights.
     *
     * @param  string  $slug
     */
    public function getMovieBySlugAndHighlights($slug): array
    {
        $movie      = $this->movieRepository->fetchMovie($slug);
        $highlights = $this->movieRepository->fetchMovieHighlights();

        $data = [
            'movieData'  => $movie,
            'highlights' => $highlights,
        ];

        return $data;
    }

    /**
     * Get movies by name with pagination.
     *
     * @param  string  $movieName
     */
    public function searchMovie($movieName): LengthAwarePaginator
    {
        $movies = $this->movieRepository->fetchMoviesByName($movieName);

        return $movies;
    }
}
