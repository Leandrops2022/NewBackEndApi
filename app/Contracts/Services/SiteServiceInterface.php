<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface SiteServiceInterface
{
    public function getHomepageData(): array;

    public function getBestMoviesOfLastYear(): LengthAwarePaginator;

    public function getAutoComplete(Request $request): array;

    public function getSearchData(string $slug): array;
}
