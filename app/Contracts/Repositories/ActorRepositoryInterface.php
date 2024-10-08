<?php

namespace App\Contracts\Repositories;

use App\Models\Actor;

interface ActorRepositoryInterface
{
    public function fetchActor($slug);
}
