<?php

namespace App\Services;

use App\Contracts\Repositories\SiteRepositoryInterface;
use App\Contracts\Services\SiteServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SiteService implements SiteServiceInterface
{
    public function __construct(private SiteRepositoryInterface $siteRepository) {}

    public function getHomepageData(): array
    {
        $homeData = $this->siteRepository->fetchHomepageHighlights();

        return [
            'highlights' => $homeData,
        ];
    }

    public function getAutoComplete(Request $request): array
    {
        $textQuery = $request->input('textQuery');
        $textQuery = '%' . $textQuery . '%';

        $results = $this->siteRepository->fetchAutoCompleteSuggestions($textQuery);

        return $results;
    }

    public function getBestMoviesOfLastYear(): LengthAwarePaginator
    {
        return $this->siteRepository->fetchTopMoviesFromLastYear();
    }

    public function getSearchData($slug): array
    {
        $textQuery = '%' . $slug . '%';
        $results = $this->siteRepository->fetchSearchData($textQuery);

        $data = $results->items();  // This gives the actual data items
        $pagination = [
            'current_page' => $results->currentPage(),
            'last_page' => $results->lastPage(),
            'per_page' => $results->perPage(),
            'total' => $results->total(),
        ];

        return ['data' => $data, 'pagination' => $pagination];
    }
}
