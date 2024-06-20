<?php

use App\Http\Controllers\Top100Controller;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'melhores',
], function () {

    Route::get('/top100Acao', [Top100Controller::class, 'showTop100Acao'])
        ->name('movie.top100Acao');

    Route::get('/top100Terror', [Top100Controller::class, 'showtop100Terror'])
        ->name('movie.top100Terror');

    Route::get('/top100Aventura', [Top100Controller::class, 'showtop100Aventura'])
        ->name('movie.top100Aventura');

    Route::get('/top100FiccaoCientifica', [Top100Controller::class, 'showtop100FiccaoCientifica'])
        ->name('movie.top100FiccaoCientifica');

    Route::get('/top100Animacao', [Top100Controller::class, 'showtop100Animacao'])
        ->name('movie.top100Animacao');

    Route::get('/top100Comedia', [Top100Controller::class, 'showtop100Comedia'])
        ->name('movie.top100Comedia');

    Route::get('/top100Drama', [Top100Controller::class, 'showTop100Drama'])
        ->name('movie.top100Drama');

    Route::get('/top100Crime', [Top100Controller::class, 'showTop100Crime'])
        ->name('movie.top100Crime');

    Route::get('/top100Fantasia', [Top100Controller::class, 'showTop100Fantasia'])
        ->name('movie.top100Fantasia');

    Route::get('/top100Familia', [Top100Controller::class, 'showTop100Familia'])
        ->name('movie.top100Familia');

    Route::get('/top100Faroeste', [Top100Controller::class, 'showtTop100Faroeste'])
        ->name('movie.top100Faroeste');

    Route::get('/top100Guerra', [Top100Controller::class, 'showtTop100Guerra'])
        ->name('movie.top100Guerra');

    Route::get('/top100Musical', [Top100Controller::class, 'showTop100Musical'])
        ->name('movie.top100Musical');

    Route::get('/top100Romance', [Top100Controller::class, 'showTop100Romance'])
        ->name('movie.top100Romance');

    Route::get('/top100Suspense', [Top100Controller::class, 'showTop100Suspense'])
        ->name('movie.top100Suspense');

    Route::get('/top100Misterio', [Top100Controller::class, 'showTop100Misterio'])
        ->name('movie.top100Misterio');


    Route::get('/top100Geral', [Top100Controller::class, 'showTop100Geral'])
        ->name('movie.top100Geral');


    Route::get('/top100FilmesClassicos', [Top100Controller::class, 'showTop100FilmesClassicos'])
        ->name('movie.top100FilmesClassicos');

    // Route::get('/{slug}', [MovieController::class, 'showDetalhesFilme'])->name('detalhesFilme');

    // Route::get('/melhores-filmes-2023', [MovieController::class, 'showMelhoresDoAno2023'])->name('melhoresFilmes2023');

    // Route::post('/vote/{id}', [MovieController::class, 'storeVote'])->name('cadastrarVoto');
});
