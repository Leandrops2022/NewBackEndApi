<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'artigo',
], function () {

    Route::get('/', [ArticleController::class, 'index'])
        ->name('artigo.index');

    Route::get('/show/{slug}', [ArticleController::class, 'showArtigo'])
        ->name('artigo.show');
});
