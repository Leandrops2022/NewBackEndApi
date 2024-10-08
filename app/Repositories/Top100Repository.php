<?php

namespace App\Repositories;

use App\Contracts\Repositories\Top100RepositoryInterface;
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
use App\Models\Top100Text;
use App\Models\Top100Thriller;
use App\Models\Top100War;
use App\Models\Top100Western;
use Illuminate\Pagination\LengthAwarePaginator;

class Top100Repository implements Top100RepositoryInterface
{
    public function fetchAllTop100(): LengthAwarePaginator
    {
        $alltop100 = Top100Highlights::paginate(10);

        return $alltop100;
    }

    public function fetchTop100Suggestions()
    {
        return Top100Highlights::inRandomOrder()->limit(4)->get();
    }

    public function fetchTop100Data($slug): LengthAwarePaginator
    {
        $top100Model = $this->mapTop100Name($slug) ?? Top100Overall::class;
        return $top100Model::select('poster', 'rank', 'nota', 'titulo_portugues', 'duracao', 'ano_lancamento', 'genero', 'tagline', 'slug')
            ->orderBy('rank', 'desc')
            ->paginate(10);
    }

    public function fetchTop100Text($slug)
    {
        return Top100Text::where('nome', 'top100' . $slug)->get();
    }

    private function mapTop100Name($slug)
    {
        $modelMapping = [
            'acao'              => Top100Action::class,
            'aventura'          => Top100Adventure::class,
            'animacao'          => Top100Animation::class,
            'classicos'         => Top100Classics::class,
            'comedia'           => Top100Comedy::class,
            'crime'             => Top100Crime::class,
            'drama'             => Top100Drama::class,
            'familia'           => Top100Family::class,
            'fantasia'          => Top100Fantasy::class,
            'terror'            => Top100Horror::class,
            'musical'           => Top100Musical::class,
            'misterio'          => Top100Mystery::class,
            'romance'           => Top100Romance::class,
            'ficçãocientifica'  => Top100ScienceFiction::class,
            'suspense'          => Top100Thriller::class,
            'guerra'            => Top100War::class,
            'faroeste'          => Top100Western::class,
            'geral'             => Top100Overall::class,

        ];

        if (isset($modelMapping[$slug])) {
            return $modelMapping[$slug];
        }
        return null;
    }
}
