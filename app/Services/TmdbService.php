<?php

namespace App\Services;

use APP\Contracts\Services\TmdbServiceInterface;
use App\Dtos\NowPlayingDTO;
use Illuminate\Support\Facades\Http;

class TmdbService implements TmdbServiceInterface
{
    private string $apiKey;
    private string  $baseImgUrl;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
        $this->baseImgUrl = 'https://image.tmdb.org/t/p/w200';
    }

    public function getWhereToWatchData(string $tmdb_id): array
    {


        $tmdbResponse = Http::get("https://api.themoviedb.org/3/movie/$tmdb_id/watch/providers?api_key=$this->apiKey");

        $providers = $tmdbResponse->json()['results']['BR']['flatrate'] ?? [];

        $providers = array_map(function ($provider) {
            $provider['logo_path'] =  $this->baseImgUrl . $provider['logo_path'];
            unset($provider['provider_id']);
            unset($provider['display_priority']);

            return $provider;
        }, $providers);
        $providers = array_slice($providers, 0, 5, true);
        return $providers;
    }

    public function getNowPlaying()
    {
        $tmdbResponse = Http::get("https://api.themoviedb.org/3/movie/now_playing?language=pt-BR&page=1&api_key=$this->apiKey");

        if ($tmdbResponse->successful() && isset($tmdbResponse['results'])) {
            $nowPlayingMovies = $tmdbResponse['results'];

            $nowPlayingList = [];
            foreach ($nowPlayingMovies as $nowPlayingMovie) {
                $posterPath = $this->baseImgUrl . $nowPlayingMovie['poster_path'];
                $nowPlayingList[] = [
                    "poster" => $posterPath,
                    "title"  => $nowPlayingMovie['title']
                ];
            }

            return $nowPlayingList;
        }
        return [];
    }
}
