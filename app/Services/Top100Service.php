<?php

namespace App\Services;

use App\Contracts\Repositories\Top100RepositoryInterface;
use App\Contracts\Services\Top100ServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Top100Service implements Top100ServiceInterface
{
    public function __construct(private Top100RepositoryInterface $top100Repository) {}

    public function getTop100List(): LengthAwarePaginator
    {
        return $this->top100Repository->fetchAllTop100();
    }

    public function getTop100Suggestions()
    {
        return $this->top100Repository->fetchTop100Suggestions();
    }

    public function getTop100Data($slug)
    {
        return $this->top100Repository->fetchTop100Data($slug);
    }

    public function getTop100Text($slug)
    {
        return $this->top100Repository->fetchTop100Text($slug);
    }
}
