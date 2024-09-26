<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'filme',
], function () {
    Route::get('/{slug}', [MovieController::class, 'show']);
    Route::get('/onde-assistir/{tmdb_id}', [MovieController::class, 'whereTowatch']);
});
