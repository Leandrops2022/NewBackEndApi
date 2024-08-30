<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/authApi.php';

require __DIR__.'/siteApi.php';

require __DIR__.'/moviesApi.php';

require __DIR__.'/articleApi.php';

require __DIR__.'/tinyListApi.php';

require __DIR__.'/top100Api.php';

require __DIR__.'/actorApi.php';
