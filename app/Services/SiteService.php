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

    public function getTop100List(): Collection
    {
        return $this->siteRepository->fetchAllTop100();
    }
}
