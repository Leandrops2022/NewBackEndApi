<?php

namespace App\Http\Controllers;

use App\Contracts\Services\HandleErrorServiceInterface;
use App\Contracts\Services\MovieServiceInterface;
use APP\Contracts\Services\TmdbServiceInterface;
use App\Http\Resources\MovieResource;

class MovieController extends Controller
{
    public function __construct(
        private MovieServiceInterface $movieService,
        private HandleErrorServiceInterface $handleErrorService,
        private TmdbServiceInterface $tmdbService
    ) {}

    public function show($slug)
    {
        if (! isset($slug)) {
            return response()->json([
                'message' => 'Você deve informar o nome de algum filme',
            ], 422);
        }

        $movieData = $this->movieService->getMovieBySlugAndHighlights($slug);
        $emptyMovieData = [
            true  => response()->json(['message' => 'Não encontrado'], 404),
            false => response()->json($this->transformMovieData($movieData)),
        ];

        return $emptyMovieData[empty($movieData)];
    }

    private function transformMovieData($movieData)
    {
        $data = $this->tmdbService->getWhereToWatchData($movieData['movieData']['tmdb_id']);

        $movieData['movieData']['whereToWatch'] = $data;
        $movieData['movieData'] = new MovieResource($movieData['movieData']);

        return $movieData;
    }
}
