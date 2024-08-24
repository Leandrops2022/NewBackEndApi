<?php

use App\Http\Controllers\MiniListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'minilista',
], function () {

    Route::get('/highlights', [MiniListController::class, 'highlights'])
        ->name('minilista.highlights');

    Route::get('/', [MiniListController::class, 'index'])
        ->name('minilista.index');

    Route::get('/{slug}', [MiniListController::class, 'show'])
        ->name('minilista.show');
});
