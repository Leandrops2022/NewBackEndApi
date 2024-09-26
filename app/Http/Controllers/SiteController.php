<?php

namespace App\Http\Controllers;

use App\Contracts\Services\SiteServiceInterface;
use App\Models\Top100Highlights;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function __construct(private SiteServiceInterface $siteService) {}

    public function home()
    {
        $highlights = $this->siteService->getHomepageData();

        return response()->json($highlights);
    }

    public function bestOfLastYear()
    {
        $list = $this->siteService->getBestMoviesOfLastYear();

        return response()->json($list);
    }

    public function autoComplete(Request $request)
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

    public function top100List()
    {
        $alltop100 = Top100Highlights::get();

        return response()->json($alltop100);
    }
}
