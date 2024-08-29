<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'adult',
        'genre_1',
        'genre_2',
        'genre_3',
        'backdrop_path',
        'budget',
        'homepage',
        'imdb_id',
        'origin_country',
        'original_language',
        'original_title',
        'overview',
        'popularity',
        'poster_path',
        'release_date',
        'revenue',
        'runtime',
        'status',
        'tagline',
        'title',
        'vote_average',
        'vote_count',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'bigint';

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class)
            ->withPivot('character', 'order')
            ->withTimestamps();
    }

    public function genre1(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function genre2(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function genre3(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
