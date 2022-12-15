<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Rh\UserController;

use App\Http\Controllers\Api\Rh\TrnPersonaController;

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


Route::group( ['middleware' => ["auth:sanctum"]], function(){

    Route::get('/personas', [TrnPersonaController::class, 'index']);
    Route::post('/personas', [TrnPersonaController::class, 'store']);
    Route::get('/personas/{id}', [TrnPersonaController::class, 'show']);
    Route::get('logout', [UserController::class, 'logout']);

});


