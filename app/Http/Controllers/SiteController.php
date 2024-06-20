<?php

namespace App\Http\Controllers;

use App\Models\Destaques;
use App\Models\SugestoesDeArtigos;
use App\Models\SugestoesDeMiniListas;
use App\Models\SugestoesDeTop100;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getDestaques()
    {
        $highlights = Destaques::orderBy('created_at', 'desc')->limit(8)->get();

        return response()->json($highlights);
    }

    public function getSugestoesDeArtigos()
    {
        $suggestions = SugestoesDeArtigos::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }

    public function getSugestoesDeListas()
    {
        $suggestions = SugestoesDeMiniListas::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }

    public function getSugestoesDeTop100()
    {
        $suggestions = SugestoesDeTop100::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }
}
