<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TipoUsuarioController;
use App\Http\Controllers\API\ArticuloController;

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

//rutas de la api que son publicas
Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);


//rutas protegidas por la autentificacion por token
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('tipos_usuario', TipoUsuarioController::class);
    Route::resource('articulo', ArticuloController::class);
});
