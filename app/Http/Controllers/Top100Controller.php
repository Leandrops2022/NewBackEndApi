<?php

namespace App\Http\Controllers;

use App\Http\Requests\Top100Request;
use App\Models\Top100Action;
use App\Models\Top100Adventure;
use App\Models\Top100Animation;
use App\Models\Top100Classics;
use App\Models\Top100Comedy;
use App\Models\Top100Crime;
use App\Models\Top100Drama;
use App\Models\Top100Family;
use App\Models\Top100Fantasy;
use App\Models\Top100Highlights;
use App\Models\Top100Horror;
use App\Models\Top100Musical;
use App\Models\Top100Mystery;
use App\Models\Top100Overall;
use App\Models\Top100Romance;
use App\Models\Top100ScienceFiction;
use App\Models\Top100Thriller;
use App\Models\Top100War;
use App\Models\Top100Western;
use Illuminate\Support\Facades\Log;

class Top100Controller extends Controller
{
    public function getTop100Suggestions()
    {
        $suggestions = Top100Highlights::inRandomOrder()->limit(4)->get();

        return response()->json($suggestions);
    }

    public function show(Top100Request $request)
    {
        $validated = $request->validated();
        try {
            $model = $this->getModel($validated['top100Name']);
        } catch (\Exception $e) {
            Log::error('Error: '.$e->getMessage().'in'.$e->getFile().'on line: '.$e->getLine());

            return response()->json('An error has ocurred while processing the request. Our developers have already been notified about this, please, try again later');
        }
    }

    private function getModel($slug)
    {
        $modelMapping = [
            'ação'              => Top100Action::class,
            'aventura'          => Top100Adventure::class,
            'animação'          => Top100Animation::class,
            'clássícos'         => Top100Classics::class,
            'comédia'           => Top100Comedy::class,
            'crime'             => Top100Crime::class,
            'drama'             => Top100Drama::class,
            'família'           => Top100Family::class,
            'fantasia'          => Top100Fantasy::class,
            'terror'            => Top100Horror::class,
            'musical'           => Top100Musical::class,
            'mistério'          => Top100Mystery::class,
            'romance'           => Top100Romance::class,
            'ficção-científica' => Top100ScienceFiction::class,
            'suspense'          => Top100Thriller::class,
            'guerra'            => Top100War::class,
            'faroeste'          => Top100Western::class,
            'geral'             => Top100Overall::class,

        ];

        return $modelMapping[$slug];
    }

}
