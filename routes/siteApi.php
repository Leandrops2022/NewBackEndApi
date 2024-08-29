<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::group(function () {

    Route::get('/home', [SiteController::class, 'getHomeData']);

    Route::get('/melhores-filmes-do-ano-passado', [SiteController::class, 'getBestMoviesOfLastYear']);

    Route::post('/auto-complete', [SiteController::class, 'getAutoComplete']);

});
