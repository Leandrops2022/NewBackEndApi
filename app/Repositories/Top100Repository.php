<?php

namespace App\Repositories;

use App\Contracts\Repositories\Top100RepositoryInterface;
use App\Models\Movie;
use App\Models\Top100Action;
use App\Models\Top100Adventure;
use App\Models\Top100Animation;
use App\Models\Top100Classics;
use App\Models\Top100Comedy;
use App\Models\Top100Crime;
use App\Models\Top100Documentary;
use App\Models\Top100Drama;
use App\Models\Top100Family;
use App\Models\Top100Fantasy;
use App\Models\Top100Highlights;
use App\Models\Top100Horror;
use App\Models\Top100Musical;
use App\Models\Top100Mystery;
use App\Models\Top100OfLastYear;
use App\Models\Top100Overall;
use App\Models\Top100Romance;
use App\Models\Top100ScienceFiction;
use App\Models\Top100Text;
use App\Models\Top100Thriller;
use App\Models\Top100War;
use App\Models\Top100Western;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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

    public function fetchTop100Data($slug)
    {
        $genderId = $this->mapTop100Name($slug) ?? 2;
        //this is necessary because of hosting service recent changes to mysql
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

        $query = match ($genderId) {
            1       => $this->fetchTop100ClassicMovies(),
            2       => $this->fetchTop100BestMovies(),
            3       => $this->fetchTop100LastYearMovies(),
            default => $this->fetchDefaultTop100($genderId),
        };
        $results = $query->orderBy('rank', 'asc')->limit(100)->get();

        $paginatedMovies = new \Illuminate\Pagination\LengthAwarePaginator(
            $results->reverse()->forPage(request()->input('page', 1), 10),
            100,
            10,
            request()->input('page', 1),
            ['path' => url()->current()]
        );

        return $paginatedMovies;

    }

    public function fetchTop100Text($slug)
    {
        return Top100Text::where('nome', 'top100' . $slug)->get();
    }

    private function mapTop100Name($slug)
    {
        $modelMapping = [
            'acao'              => 28,
            'aventura'          => 12,
            'animacao'          => 16,
            'filmesclassicos'   => 1,
            'comedia'           => 35,
            'crime'             => 80,
            'drama'             => 18,
            'familia'           => 10751,
            'fantasia'          => 14,
            'terror'            => 27,
            'musical'           => 10402,
            'misterio'          => 9648,
            'romance'           => 10749,
            'ficcaocientifica'  => 878,
            'suspense'          => 53,
            'guerra'            => 10752,
            'faroeste'          => 37,
            'melhores'          => 2,
            'anopassado'        => 3,
            'documentario'      => 99,

        ];

        if (isset($modelMapping[$slug])) {
            return $modelMapping[$slug];
        }
        return null;
    }

    private function baseQuery() {

        return Movie::select('poster', 'nota', 'titulo_portugues', 'duracao', 'ano_lancamento', 'genres', 'tagline', 'slug',
            DB::raw('ROW_NUMBER() OVER (ORDER BY nota DESC) AS rank'))
            ->where('quantidade_de_votos', '>', 2000)
            ->where('nota', '>', 7);
    }

    private function fetchDefaultTop100($genreId) {
        return $this->baseQuery()
            ->where(function ($query) use ($genreId) {
                $query->where('genero_1',$genreId)
                    ->orWhere('genero_2', $genreId)
                    ->orWhere('genero_3', $genreId);
            });

    }

    private function fetchTop100ClassicMovies() {
        return $this->baseQuery()->where('ano_lancamento','<', 2005);
    }

    private function fetchTop100BestMovies() {
        return $this->baseQuery();
    }

    private function fetchTop100LastYearMovies() {
        return $this->baseQuery()->where('ano_lancamento', '=', now()->subYear()->year);
    }
}
