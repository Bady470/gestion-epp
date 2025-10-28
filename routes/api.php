<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermisoController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\ProgramaController;
use App\Http\Controllers\Api\FichaController;
use App\Http\Controllers\Api\FiltroController;
use App\Http\Controllers\Api\ElementoPPController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\ElementoXPedidoController;
use App\Http\Controllers\Api\SolicitudController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

// Public
Route::get('/', function(){
    return response()->json([
        'name' => config('app.name'),
        'version' => config('app.version','1.0'),
        'status' => 'ok',
        'docs' => url('/api/documentation'),
    ]);
});

Route::post('register', [AuthController::class,'register']);
Route::post('login',    [AuthController::class,'login']);

// Protected API
/* Route::middleware('auth:sanctum')->group(function () { */
    Route::post('logout', [AuthController::class,'logout']);

    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permisos', PermisoController::class);
    Route::apiResource('areas', AreaController::class);
    Route::apiResource('programas', ProgramaController::class);
    Route::apiResource('fichas', FichaController::class);
    Route::apiResource('filtros', FiltroController::class);
    Route::apiResource('elementos_pp', ElementoPPController::class);
    Route::apiResource('pedidos', PedidoController::class);
    Route::apiResource('elementos_x_pedido', ElementoXPedidoController::class);
    Route::apiResource('solicitudes', SolicitudController::class);
/* }); */
