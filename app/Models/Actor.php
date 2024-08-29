<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'profile_path',
        'place_of_birth',
        'popularity',
        'tmdb_id',
        'adult',
        'also_known_as',
        'biography',
        'birthday',
        'deathday',
        'gender',
        'homepage',
        'imdb_id',
        'known_for_department',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'bigint';

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class)
            ->withPivot('character', 'order')
            ->withTimestamps();
    }
}
