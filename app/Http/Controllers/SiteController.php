<?php

namespace App\Http\Controllers;

use App\Contracts\Services\SiteServiceInterface;
use App\Models\Top100Highlights;
use App\Services\TmdbService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    public function __construct(private SiteServiceInterface $siteService, private TmdbService $tmdbService) {}

    public function home()
    {
        return response()->json($this->siteService->getHomepageData());
    }

    public function bestOfLastYear()
    {
        return response()->json($this->siteService->getBestMoviesOfLastYear());
    }

    public function autoComplete(Request $request)
    {
        return response()->json($this->siteService->getAutoComplete($request));
    }

    public function nowPlaying()
    {
        $nowPlayingData = $this->tmdbService->getNowPlaying();

        return response()->json($nowPlayingData);
    }
}
