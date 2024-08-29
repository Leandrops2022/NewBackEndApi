<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'movie',
], function () {
    Route::get('/{slug}', [MovieController::class, 'show']);
});
