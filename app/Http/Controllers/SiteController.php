<?php

namespace App\Http\Controllers;

use App\Models\BestMoviesOfLastYear;
use App\Models\Destaques;
use App\Models\SugestoesDeArtigos;
use App\Models\SugestoesDeMiniListas;
use App\Models\SugestoesDeTop100;
use Illuminate\Http\Request;

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
}
