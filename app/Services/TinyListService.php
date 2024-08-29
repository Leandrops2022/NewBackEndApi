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
        $tinyList   = $this->tinyListRepository->getTinyList($slug);
        $highlights = $this->tinyListRepository->getTinyListHighlights();

        $movie_ids = json_decode($tinyList->filmes_ids, true);

        $movies = $this->movieRepository->getMoviesByIds($movie_ids);

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
        $tinyLists = $this->tinyListRepository->getAllTinyLists();

        return $tinyLists;
    }
}
