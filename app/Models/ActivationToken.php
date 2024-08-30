<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token'
    ];

    // protected $table = 'activation_tokens';
}
