<?php

namespace App\Services;

use APP\Contracts\Services\TmdbServiceInterface;
use Illuminate\Support\Facades\Http;

class TmdbService implements TmdbServiceInterface
{
    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function getWhereToWatchData(string $tmdb_id): array
    {
        $baseImgUrl = 'https://image.tmdb.org/t/p/w200';

        $tmdbResponse = Http::get("https://api.themoviedb.org/3/movie/$tmdb_id/watch/providers?api_key=$this->apiKey");

        $providers = $tmdbResponse->json()['results']['BR']['flatrate'] ?? [];

        $providers = array_map(function ($provider) use ($baseImgUrl) {
            $provider['logo_path'] =  $baseImgUrl . $provider['logo_path'];
            unset($provider['provider_id']);
            unset($provider['display_priority']);

            return $provider;
        }, $providers);
        $providers = array_slice($providers, 0, 5, true);
        return $providers;
    }
}
