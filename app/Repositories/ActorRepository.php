<?php

namespace App\Repositories;

use App\Contracts\ActorRepositoryInterface;
use App\Models\Actor;
use App\Models\Article;
use App\Models\ArticleHighlights;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
