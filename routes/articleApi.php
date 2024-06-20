<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'article',
], function () {

    Route::get('/', [ArticleController::class, 'index'])
        ->name('article.index');

    Route::get('/show/{slug}', [ArticleController::class, 'showArticle'])
        ->name('article.show');
});
