<?php

namespace App\Services;

use App\Contracts\Repositories\MovieRepositoryInterface;
use App\Contracts\Repositories\TinyListRepositoryInterface;
use App\Contracts\Services\TinyListServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class TinyListService implements TinyListServiceInterface
{
    public function __construct(
        protected TinyListRepositoryInterface $tinyListRepository,
        protected MovieRepositoryInterface $movieRepository
    ) {}

    public function getTinyListAndHighlights($slug): array
    {

        $tinyList   = $this->tinyListRepository->fetchTinyList($slug);

        $highlights = $this->tinyListRepository->fetchTinyListHighlights();

        $movie_ids = json_decode($tinyList->filmes_ids, true);

        $movies = $this->movieRepository->fetchMoviesByIds($movie_ids);

        $content = [
            'imgSrc'  => $tinyList->imagem_capa,
            'imgAlt'  => $tinyList->alt_imagem_capa,
            'title'   => $tinyList->titulo,
            'content' => $tinyList->texto,
        ];

        $data = [
            'content'    => $content,
            'highlights' => $highlights,
            'movies'     => $movies,
        ];

        return $data;
    }

    public function getAllTinyLists(): LengthAwarePaginator
    {
        $tinyLists = $this->tinyListRepository->fetchAllTinyLists();

        return $tinyLists;
    }
}
