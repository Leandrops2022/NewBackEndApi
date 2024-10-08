<?php

use App\Http\Controllers\TinyListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'minilistas',
], function () {

    Route::get('/', [TinyListController::class, 'index'])
        ->name('tinyList.index');

    Route::get('/highlights', [TinyListController::class, 'highlights'])
        ->name('tinyList.highlights');

    Route::get('/{slug}', [TinyListController::class, 'show'])
        ->name('tinyList.show');
});
