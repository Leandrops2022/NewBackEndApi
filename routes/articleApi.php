<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'article',
], function () {

    Route::get('/index', [ArticleController::class, 'index'])
        ->name('article.index');

    Route::get('/{slug}', [ArticleController::class, 'show'])
        ->name('article.show');

});
