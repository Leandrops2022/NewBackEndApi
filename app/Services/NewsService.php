<?php

namespace App\Services;

use App\Contracts\Repositories\NewsRepositoryInterface;
use App\Contracts\Services\NewsServiceInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsService implements NewsServiceInterface
{
    public function __construct(
        protected NewsRepositoryInterface $newsRepository,
    ) {}

    public function getNewsAndHighlights($slug): array
    {
        $news    = $this->newsRepository->fetchNews($slug);
        $highlights = $this->newsRepository->fetchNewsHighlights();

        $createdAt = Carbon::parse($news->created_at);
        $formattedDate = $createdAt->format('d/m/Y');

        $content = [
            'imgSrc'     => $news->imagem_capa,
            'imgAlt'     => $news->alt_capa,
            'title'      => $news->titulo,
            'content'    => $news->texto,
            'trailer'    => $news->trailer ?? null,
            'created_at' => $formattedDate
        ];

        $data = [
            'content'    => $content,
            'highlights' => $highlights,
        ];

        return $data;
    }

    public function getAllNews(): LengthAwarePaginator
    {
        $news = $this->newsRepository->fetchAllNews();

        return $news;
    }
}
