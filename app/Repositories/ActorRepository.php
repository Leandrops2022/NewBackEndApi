<?php

namespace App\Repositories;

use App\Contracts\Repositories\ActorRepositoryInterface;
use App\Models\Actor;

class ActorRepository implements ActorRepositoryInterface
{
    public function store(array $data): Actor
    {
        $actor = Actor::create($data);
        return $actor;
    }

    public function update(array $data): bool
    {
        $actor = Actor::findOrFail($data['actor_id']);
        return $actor->update($data);
    }

    public function show($actor_id): Actor{
        return Actor::findOrFail($actor_id);
    }
}
