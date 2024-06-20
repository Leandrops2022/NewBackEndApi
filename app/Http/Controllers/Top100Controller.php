<?php

namespace App\Http\Controllers;

use App\Models\{Top100Acao, Top100Aventura, Top100Crime, Top100Drama, Top100Familia, Top100FiccaoCientifica};

use Illuminate\Http\Request;

class Top100Controller extends Controller
{
    public function showTop100Acao(Request $request)
    {
        $top100Acao = Top100Acao::all();

        return response()->json($top100Acao);
    }

    public function showTop100Aventura(Request $request)
    {
        $top100Acao = Top100Aventura::all();

        return response()->json($top100Acao);
    }

    public function showTop100Crime(Request $request)
    {
        $top100Acao = Top100Crime::all();

        return response()->json($top100Acao);
    }

    public function showTop100Drama(Request $request)
    {
        $top100Acao = Top100Drama::all();

        return response()->json($top100Acao);
    }

    public function showTop100Familia(Request $request)
    {
        $top100Acao = Top100Familia::all();

        return response()->json($top100Acao);
    }

    public function showTop100Top100FiccaoCientifica(Request $request)
    {
        return response()->json(Top100FiccaoCientifica::all());
    }

    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
    // public function showTop100Acao(Request $request)
    // {
    //     $top100Acao = Top100Acao::all();

    //     return response()->json($top100Acao);
    // }
}
