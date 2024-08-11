<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieDetailsRequest;
use App\Models\MovieDetails;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function getMovieDetails($slug)
    {
        if (!isset($slug)) {
            return response()->json([
                'message' => 'Você deve informar o nome de algum filme'
            ], 422);
        }

        $movieData = MovieDetails::where('slug', $slug)->first();

        $emptyMovieData = [
            true  => response()->json(['message' => 'Não encontrado'], 404),
            false => response()->json($movieData)
        ];

        return $emptyMovieData[empty($movieData)];
    }
}
