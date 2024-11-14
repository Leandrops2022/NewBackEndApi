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

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/test', function () {
    return response()->json('connection test passed');
});

Route::get('/policy', function () {
    $markdown = File::get(resource_path('markdown/policy.md'));

    $policyHtml = Str::markdown($markdown);

    return response()->json($policyHtml);
});

Route::get('/terms', function () {
    $markdown = File::get(resource_path('markdown/terms.md'));

    $termsHtml = Str::markdown($markdown);

    return response()->json($termsHtml);
});


require __DIR__ . '/authApi.php';

require __DIR__ . '/siteApi.php';

require __DIR__ . '/moviesApi.php';

require __DIR__ . '/articleApi.php';

require __DIR__ . '/tinyListApi.php';

require __DIR__ . '/top100Api.php';

require __DIR__ . '/actorApi.php';

require __DIR__ . '/newsApi.php';
