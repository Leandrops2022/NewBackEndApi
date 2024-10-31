<?php

namespace App\Contracts\Services;

interface TmdbServiceInterface
{
    public function getWhereToWatchData(string $tmdb_id): array;

    public function getNowPlaying();
}
