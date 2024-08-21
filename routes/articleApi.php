<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'artigo',
], function () {

    Route::get('/highLights', [ArticleController::class, 'highlights']);

    Route::get('/', [ArticleController::class, 'index'])
        ->name('artigo.index');

    Route::get('/{slug}', [ArticleController::class, 'show'])
        ->name('artigo.show');

});
