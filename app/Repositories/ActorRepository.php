<?php

namespace App\Repositories;

use App\Contracts\Repositories\ActorRepositoryInterface;
use App\Models\Actor;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ActorRepository implements ActorRepositoryInterface
{
    public function fetchActor($slug)
    {
        $data = Actor::with('movies')
            ->where('slug', $slug)
            ->select('id', 'poster', 'nome', 'nascimento', 'local_nascimento', 'morte', 'biografia')
            ->first();

        if (empty($data)) {
            throw new ModelNotFoundException("Ator não encontrado", 1);
        }


        return $data;
    }
}
