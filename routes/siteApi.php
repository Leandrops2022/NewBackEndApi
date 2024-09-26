<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [SiteController::class, 'home']);

Route::get('/melhores-filmes-do-ano-passado', [SiteController::class, 'bestOfLastYear']);

Route::get('/melhores-por-genero', [SiteController::class, 'top100List']);

Route::post('/auto-complete', [SiteController::class, 'autoComplete']);
