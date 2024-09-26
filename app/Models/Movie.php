<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'filmes';

    protected $fillable = [
        'titulo_portugues',
        'resumo_portugues',
        'duracao',
        'ano_lancamento',
        'genero_1',
        'poster',
        'nota',
        'imdb_id',
        'tmdb_id',
        'tagline',
        'poster_mobile',
        'quantidade_de_votos',
        'arrecadacao',
        'genero_2',
        'genero_3',
        'poster_fallback',
        'trailer',
        'slug',
        'tag',
        'rota',
        'data_lancamento',
        'adulto',
        'ultimo_update',
        'status',
    ];

    protected static $fieldMappings = [
        'id'            => 'id',
        'adult'         => 'adulto',
        'genre_1'       => 'genero_1',
        'genre_2'       => 'genero_2',
        'genre_3'       => 'genero_3',
        'backdrop_path' => 'poster_fallback',
        'imdb_id'       => 'imdb_id',
        'overview'      => 'resumo_portugues',
        'poster_path'   => 'poster_mobile',
        'release_date'  => 'data_lancamento',
        'runtime'       => 'duracao',
        'status'        => 'status',
        'tagline'       => 'tag',
        'title'         => 'titulo_portugues',
        'vote_average'  => 'nota',
        'vote_count'    => 'quantidade_de_votos',
        'revenue'       => 'arrecadacao',
    ];

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'elenco_filmes', 'id_filme', 'id_ator')
            ->withPivot('personagem', 'ordem_importancia')
            ->withTimestamps()
            ->select(['atores.id', 'atores.nome', 'atores.poster', 'atores.slug']);
    }

    public function genero1(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genero_1');
    }

    public function genero2(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genero_2');
    }

    public function genero3(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genero_3');
    }

    public function movieVideos(): HasMany
    {
        return $this->hasMany(MovieVideo::class, 'movie_id');
    }
}
