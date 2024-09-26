<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'atores';

    protected $fillable = [
        'imdb_id',
        'nome',
        'biografia',
        'nascimento',
        'morte',
        'genero_sexo',
        'local_nascimento',
        'popularidade',
        'poster',
        'imagem',
        'imagem_fallback',
        'tag',
        'rota',
        'slug',
        'tmdb_id',
    ];

    protected $fieldMappings = [
        'id'             => 'id',
        'name'           => 'nome',
        'profile_path'   => 'poster',
        'place_of_birth' => 'local_nascimento',
        'popularity'     => 'popularidade',
        'tmdb_id'        => 'tmdb_id',
        'biography'      => 'biografia',
        'birthday'       => 'nascimento',
        'deathday'       => 'morte',
        'gender'         => 'genero_sexo',
        'imdb_id'        => 'imdb_id',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'int';

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'elenco_filmes', 'id_ator', 'id_filme')
            ->withPivot('personagem', 'ordem_importancia')
            ->withTimestamps();
    }
}
