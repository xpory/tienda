<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TipoUsuarioController;
use App\Http\Controllers\API\ArticuloController;
use App\Http\Controllers\API\CategoriaController;
use App\Http\Controllers\API\DetallePedidoProveedorController;
use App\Http\Controllers\API\DetalleVentaController;
use App\Http\Controllers\API\EmpleadoController;
use App\Http\Controllers\API\EncabezadoVentaController;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\API\EstadoPedidoController;
use App\Http\Controllers\API\IvaController;
use App\Http\Controllers\API\PedidosProveedorController;
use App\Http\Controllers\API\ProveedorController;

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
    Route::resource('categoria', CategoriaController::class);
    Route::resource('detalle_pedido_proveedor', DetallePedidoProveedorController::class);
    Route::resource('detalle_venta', DetalleVentaController::class);
    Route::resource('empleado', EmpleadoController::class);
    Route::resource('encabezado_venta', EncabezadoVentaController::class);
    Route::resource('estado_pedido', EstadoPedidoController::class);
    Route::resource('iva', IvaController::class);
    Route::resource('pedidos_proveedor', PedidosProveedorController::class);
    Route::resource('proveedor', ProveedorController::class);
});
