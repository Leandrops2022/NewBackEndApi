<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;

class MovieController extends Controller
{
    public function show($slug)
    {
        if (! isset($slug)) {
            return response()->json([
                'message' => 'Você deve informar o nome de algum filme',
            ], 422);
        }

        $movieData = MovieDetail::where('slug', $slug)->first();

        $emptyMovieData = [
            true  => response()->json(['message' => 'Não encontrado'], 404),
            false => response()->json($movieData),
        ];

        return $emptyMovieData[empty($movieData)];
    }
}
