<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importación de controladores
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí se registran todas las rutas del sistema SAD-UGEL.
| Estas rutas son cargadas por el RouteServiceProvider dentro del grupo "api".
|
*/

// ✅ Rutas públicas de autenticación
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// ✅ Rutas protegidas con autenticación Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Información del usuario autenticado
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);

    // 🔒 Rutas principales del sistema SAD-UGEL (solo con login)
    Route::apiResource('instituciones', InstitucionController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('docentes', DocenteController::class);
});

// Ruta de prueba del usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
