<?php

namespace App\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface SiteServiceInterface
{
    public function getHomepageData(): array;

    public function getBestMoviesOfLastYear(): LengthAwarePaginator;

    public function getAutoComplete(Request $request): array;
}
