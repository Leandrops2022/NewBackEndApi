<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface SiteRepositoryInterface
{
    public function fetchHomepageHighlights(): Collection;

    public function fetchTopMoviesFromLastYear(): LengthAwarePaginator;

    public function fetchAutoCompleteSuggestions(string $query): array;

    public function fetchAllTop100(): Collection;
}
