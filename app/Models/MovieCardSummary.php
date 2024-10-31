<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCardSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_1',
        'genre_2',
        'genre_3',
        'backdrop_path',
        'overview',
        'poster_path',
        'release_date',
        'runtime',
        'tagline',
        'title',
        'vote_average',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'bigint';
}
