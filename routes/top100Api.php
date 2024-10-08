<?php

use App\Http\Controllers\Top100Controller;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'top100',
], function () {

    Route::get('/', [Top100Controller::class, 'index']);

    Route::get('/{slug}', [Top100Controller::class, 'getTop100Data']);

    Route::get('/{slug}/texts', [Top100Controller::class, 'getTop100Text']);
});
