<?php

namespace App\Http\Controllers;

use App\Contracts\Services\SiteServiceInterface;
use App\Contracts\Services\TmdbServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SiteController extends Controller
{
    public function __construct(private SiteServiceInterface $siteService, private TmdbServiceInterface $tmdbService) {}

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

    public function SearchData($slug)
    {
        if (empty($slug)) {
            return response()->json(Response::HTTP_NOT_FOUND);
        }

        return response()->json($this->siteService->getSearchData($slug));
    }
}
