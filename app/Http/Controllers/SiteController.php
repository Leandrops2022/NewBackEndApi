<?php

namespace App\Http\Controllers;

use App\Models\BestMoviesOfLastYear;
use App\Models\GeneralHighlights;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function getHomeData()
    {
        $highlights = GeneralHighlights::inRandomOrder()->limit(8)->get();

        $data = [
            'highlights' => $highlights,
        ];

        return $data;
    }

    public function getBestMoviesOfLastYear()
    {
        $list = BestMoviesOfLastYear::select('titulo_portugues', 'rank', 'poster', 'duracao', 'ano_lancamento', 'nota', 'tagline', 'slug', 'genero')
            ->orderBy('rank', 'desc')
            ->paginate(10);

        return response()->json($list);
    }

    public function getAutoComplete(Request $request)
    {
        $textQuery = $request->input('textQuery');
        $textQuery = '%'.$textQuery.'%'; // Add wildcards for partial matching

        // Perform a single query to fetch both movies and actors, removing special characters
        $results = DB::table(DB::raw("(
            SELECT filmes.titulo_portugues AS nome, rota, slug, tag
            FROM filmes
            WHERE titulo_portugues LIKE ? AND titulo_portugues NOT REGEXP '^[^a-zA-Z0-9]'
            UNION
            SELECT nome, rota, slug, tag
            FROM atores
            WHERE nome LIKE ? AND nome NOT REGEXP '^[^a-zA-Z0-9]'
        ) AS combined"))
            ->setBindings([$textQuery, $textQuery])
            ->limit(10) // Adjust the limit as needed
            ->get(['nome', 'rota', 'slug', 'tag']) // Get both columns as an array of objects
            ->toArray();

        return response()->json($results);
    }
}
