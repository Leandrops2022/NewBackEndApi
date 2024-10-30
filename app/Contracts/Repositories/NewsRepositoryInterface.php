<?php

namespace App\Contracts\Repositories;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface NewsRepositoryInterface
{
    public function fetchNews($slug): News;

    public function fetchAllNews(): LengthAwarePaginator;

    public function fetchNewsHighlights(): Collection;
}
