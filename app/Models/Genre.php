<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'generos';

    protected $fillable = [
        'id',
        'nome',
    ];

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
