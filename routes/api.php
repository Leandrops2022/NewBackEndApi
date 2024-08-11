<?php

use App\Http\Controllers\SiteController;
use App\Http\Requests\AdicionaFilmeRequest;
use App\Http\Requests\RemoverFilmeRequest;
use App\Models\ListaDoUsuario;
use App\Models\RelacionamentoListaFilme;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;


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

Route::get('/home', [SiteController::class, 'getHomeData']);
Route::get('/article-suggestions', [SiteController::class, 'getArticleSuggestions']);
Route::get('/lists-suggestions', [SiteController::class, 'getListsSuggestions']);
Route::get('/top100-suggestions', [SiteController::class, 'getTop100Suggestions']);
Route::get('/best-movies-of-last-year', [SiteController::class, 'getBestMoviesOfLastYear']);

Route::post('/auto-complete', [SiteController::class, 'getAutoComplete']);


// Route::middleware('auth:sanctum')->group(function () {

// Route::post('/adicionaFilmeNaLista', function (AdicionaFilmeRequest $request) {

//     $idLista = $request->input('id_lista');

//     $quantidadeLista = RelacionamentoListaFilme::where('id_lista', $idLista)->count();

//     if ($quantidadeLista == 100) {
//         return response()->json("Você só pode adicionar 100 filmes na lista", 403);
//     }

//     $adicoes = $request->input('lista');

//     $now = Carbon::now();

//     $valuesToInsert = [];

//     foreach ($adicoes as $elemento) {

//         $valuesToInsert[] = [
//             'id_lista' => $idLista,
//             'id_filme' => $elemento,
//             'created_at' => $now,
//             'updated_at' => $now,
//         ];
//     }

//     $listaDoUsuario = RelacionamentoListaFilme::insertOrIgnore($valuesToInsert);

//     return response()->json($listaDoUsuario, 201);
// });

// Route::delete('/removerFilme/{id}', function (Request $request) {
//     $idUsuario =  $request->user()->id;
//     $idFilme =  $request->id;
//     $listaDoUsuario = ListaDoUsuario::where('id_usuario', $idUsuario)->get();
//     $idLista = $listaDoUsuario[0]->id;

//     RelacionamentoListaFilme::where([
//         'id_lista' => $idLista,
//         'id_filme' => $idFilme,
//     ])->delete();

//     return response()->noContent();
// });

// });

require __DIR__ . "/moviesApi.php";

require __DIR__ . "/articleApi.php";

require __DIR__ . "/miniListApi.php";

require __DIR__ . "/top100Api.php";
