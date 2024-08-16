<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\BestMoviesOfLastYear;
use App\Models\Destaques;
use App\Models\Movie;
use App\Models\SugestoesDeArtigos;
use App\Models\SugestoesDeMiniListas;
use App\Models\SugestoesDeTop100;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function getHomeData()
    {
        $highlights = Destaques::inRandomOrder()->limit(8)->get();

        $data = [
            'highlights' => $highlights,
        ];

        return $data;
    }

    public function getArticleSuggestions()
    {
        $suggestions = SugestoesDeArtigos::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }

    public function getListsSuggestions()
    {
        $suggestions = SugestoesDeMiniListas::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }

    public function getTop100Suggestions()
    {
        $suggestions = SugestoesDeTop100::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }

    public function getBestMoviesOfLastYear()
    {
        $list = BestMoviesOfLastYear::select('titulo_portugues', 'rank', 'poster', 'duracao', 'ano_lancamento', 'nota', 'tagline', 'slug', 'genero')
            ->orderBy('rank', 'desc')
            ->paginate(10);

        return response()->json($list);
    }

    // public function getAutoComplete(Request $request)
    // {
    //     $textQuery = $request->input('textQuery');
    //     $textQuery = '%' . $textQuery . '%'; // Add wildcards for partial matching

    //     // Define the queries for each table
    //     $moviesQuery = DB::table('filmes')
    //         ->select('titulo_portugues as nome')
    //         ->where('titulo_portugues', 'LIKE', $textQuery)
    //         ->limit(5)
    //         ->pluck('nome')
    //         ->toArray();

    //     return response()->json($moviesQuery);
    // }
    public function getAutoComplete(Request $request)
    {
        $textQuery = $request->input('textQuery');
        $textQuery = '%' . $textQuery . '%'; // Add wildcards for partial matching

        // Perform a single query to fetch both movies and actors, removing special characters
        $results = DB::table(DB::raw("( 
            SELECT titulo_portugues AS nome 
            FROM filmes 
            WHERE titulo_portugues LIKE ? AND titulo_portugues NOT REGEXP '^[^a-zA-Z0-9]' 
            UNION 
            SELECT nome 
            FROM atores 
            WHERE nome LIKE ? AND nome NOT REGEXP '^[^a-zA-Z0-9]' 
        ) AS combined"))
            ->setBindings([$textQuery, $textQuery])
            ->limit(10) // Adjust the limit as needed
            ->pluck('nome')
            ->toArray();

        return response()->json($results);
    }
}
