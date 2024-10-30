<?php

namespace App\Repositories;

use App\Contracts\Repositories\ActorRepositoryInterface;
use App\Models\Actor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ActorRepository implements ActorRepositoryInterface
{
    public function fetchActor($slug)
    {
        //this is necessary because of hosting service recent changes to mysql
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

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
