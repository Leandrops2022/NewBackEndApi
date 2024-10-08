<?php

namespace App\Services;

use App\Contracts\Repositories\ActorRepositoryInterface;
use App\Contracts\Services\ActorServiceInterface;
use App\Repositories\ActorRepository;

class ActorService implements ActorServiceInterface
{
    public function __construct(private ActorRepositoryInterface $repository) {}

    public function getActor($slug)
    {
        return $this->repository->fetchActor($slug);
    }
}
