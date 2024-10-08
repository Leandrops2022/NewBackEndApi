<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [SiteController::class, 'home']);

Route::get('/melhores-filmes-do-ano-passado', [SiteController::class, 'bestOfLastYear']);

Route::post('/auto-complete', [SiteController::class, 'autoComplete']);

Route::get('/nos-cinemas', [SiteController::class, 'nowPlaying']);
