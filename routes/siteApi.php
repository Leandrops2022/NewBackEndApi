<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;



Route::get('/home', [SiteController::class, 'getHomeData']);

Route::get('/best-movies-of-last-year', [SiteController::class, 'getBestMoviesOfLastYear']);

Route::post('/auto-complete', [SiteController::class, 'getAutoComplete']);


