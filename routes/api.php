<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Rh\UserController;

use App\Http\Controllers\Api\Rh\ClEstadoCivilController;
use App\Http\Controllers\Api\Rh\ClGeneroController;
use App\Http\Controllers\Api\Rh\ClParentescoController;
use App\Http\Controllers\Api\Rh\ClPaisController;
use App\Http\Controllers\Api\Rh\ClCiudadController;

use App\Http\Controllers\Api\Rh\TrnPersonaController;
use App\Http\Controllers\Api\Rh\TrnParentescoController;
use App\Http\Controllers\Api\Rh\TrnDocumentoDigitalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registrarse', [UserController::class, 'register']);
Route::post('ingresar', [UserController::class, 'login']);

Route::get('/personas', [TrnPersonaController::class, 'index']);
Route::post('/personas', [TrnPersonaController::class, 'store']);
Route::get('/personas/{id}', [TrnPersonaController::class, 'show']);
Route::put('/personas/{id}', [TrnPersonaController::class, 'update']);

Route::get('/parentescos', [TrnParentescoController::class, 'index']);

Route::get('/documentos', [TrnDocumentoDigitalController::class, 'index']);
Route::post('/documentos', [TrnDocumentoDigitalController::class, 'store']);
Route::get('/documentos/persona/{id_persona}/{id_tabla}', [TrnDocumentoDigitalController::class, 'documentoPersonaIdTabla']);
Route::put('/documentos/{id}', [TrnDocumentoDigitalController::class, 'update']);

Route::get('/estados-civiles', [ClEstadoCivilController::class, 'index']);
Route::post('/estados-civiles', [ClEstadoCivilController::class, 'store']);
Route::put('/estados-civiles/{id}', [ClEstadoCivilController::class, 'update']);

Route::get('/generos', [ClGeneroController::class, 'index']);
Route::post('/generos', [ClGeneroController::class, 'store']);
Route::put('/generos/{id}', [ClGeneroController::class, 'update']);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::get('logout', [UserController::class, 'logout']);
});
