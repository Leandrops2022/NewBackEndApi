<?php

use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'atores',
], function () {

    Route::get('/{slug}', [ActorController::class, 'show'])
        ->name('actor.show');
});

Route::group([
    'prefix'     => 'actor',
    'middleware' => ['auth:sanctum', 'role:admin'],
], function () {
    Route::post('/', [ActorController::class, 'store'])
        ->name('actor.store');
});
