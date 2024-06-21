<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MiniListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'minilista',
], function () {

    Route::get('/', [ArticleController::class, 'index'])
        ->name('minilista.index');

    Route::get('/show/{slug}', [MiniListController::class, 'showMinilista'])
        ->name('minilista.show');
});
