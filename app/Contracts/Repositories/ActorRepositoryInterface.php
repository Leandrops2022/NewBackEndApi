<?php

namespace App\Contracts\Repositories;

use App\Models\Actor;

interface ActorRepositoryInterface
{
    public function store(array $data): Actor;

    public function update(array $data): bool;

    public function show($actor_id): Actor;
}
