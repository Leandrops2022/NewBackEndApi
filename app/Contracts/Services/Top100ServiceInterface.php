<?php

namespace App\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface Top100ServiceInterface
{
    public function getTop100List(): LengthAwarePaginator;

    public function getTop100Suggestions();
    public function getTop100Data($slug);
    public function getTop100Text($slug);
}
