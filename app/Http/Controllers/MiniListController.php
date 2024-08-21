<?php

namespace App\Http\Controllers;

use App\Models\MiniList;
use App\Models\MinilistHighlights;

class MiniListController extends Controller
{
    public function show($slug)
    {
        $data = MiniList::where('slug', $slug)->firstOrFail();

        return response()->json($data);
    }

    public function highlights()
    {
        $suggestions = MinilistHighlights::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }
}
