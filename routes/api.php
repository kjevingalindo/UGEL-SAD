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
| Aquí se registran las rutas de la API para tu aplicación.
| Estas rutas están cargadas por RouteServiceProvider y todas
| están dentro del grupo "api". ¡Disfruta construyendo tu API!
|
*/

// Ruta para obtener el usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ===============================
// 🔓 RUTAS PÚBLICAS (sin token)
// ===============================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ===============================
// 🔒 RUTAS PROTEGIDAS (requieren token Sanctum)
// ===============================
Route::middleware('auth:sanctum')->group(function () {

    // Rutas de autenticación protegidas
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rutas principales del sistema SAD-UGEL
    Route::apiResource('instituciones', InstitucionController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('docentes', DocenteController::class);
});
