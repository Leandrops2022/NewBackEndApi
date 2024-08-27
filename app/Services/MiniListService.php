<?php

namespace App\Services;

use App\Contracts\Repositories\MiniListRepositoryInterface;
use App\Contracts\Repositories\MovieRepositoryInterface;
use App\Contracts\Services\MiniListServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class MiniListService implements MiniListServiceInterface
{
    public function __construct(
        protected MiniListRepositoryInterface $miniListRepository,
        protected MovieRepositoryInterface $movieRepository
    ){}

    public function getMiniListAndHighlights($slug): array
    {
        $miniList = $this->miniListRepository->getMiniList($slug);
        $highlights = $this->miniListRepository->getMiniListHighlights();

        $movie_ids = json_decode($miniList->filmes_ids, true);

        $movies = $this->movieRepository->getMoviesByIds($movie_ids);

        $content = [
            'imgSrc'  => $miniList->imagem_capa,
            'imgAlt'  => $miniList->alt_imagem_capa,
            'title'   => $miniList->titulo,
            'content' => $miniList->texto,
        ];

        $data = [
            'content'    => $content,
            'highlights' => $highlights,
            'movies'     => $movies,
        ];

        return $data;
    }

    public function getAllMiniLists(): LengthAwarePaginator
    {
        $miniLists = $this->miniListRepository->getAllMiniLists();
        return $miniLists;
    }
}
