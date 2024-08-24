<?php

namespace App\Http\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieRepository implements MovieRepositoryInterface
{
    public function getMovie($slug): Movie{
       return  Movie::where('slug', $slug)->firstOrFail();
    }

    public function getMoviesByIds(array $ids): Collection
    {
        return Movie::whereIn('id', $ids)->get();

    }


}
