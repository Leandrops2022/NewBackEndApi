<?php

namespace App\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface Top100RepositoryInterface
{
    public function fetchAllTop100(): LengthAwarePaginator;

    public function fetchTop100Suggestions();
    public function fetchTop100Data($slug): LengthAwarePaginator;
    public function fetchTop100Text($slug);
}
