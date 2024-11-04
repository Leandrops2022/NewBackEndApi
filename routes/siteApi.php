<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


Route::post('/auto-complete', [SiteController::class, 'autoComplete'])->middleware('cors');

Route::get('/home', [SiteController::class, 'home']);

Route::get('/melhores-filmes-do-ano-passado', [SiteController::class, 'bestOfLastYear']);


Route::get('/nos-cinemas', [SiteController::class, 'nowPlaying']);

Route::get('/busca/{slug}', [SiteController::class, 'SearchData']);
