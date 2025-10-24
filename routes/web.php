<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DocenteController;

/*
|--------------------------------------------------------------------------
| Rutas Web + API (Laravel 11-12)
|--------------------------------------------------------------------------
*/

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// ✅ Rutas API REST
Route::middleware('api')->group(function () {
    Route::apiResource('instituciones', InstitucionController::class);
    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('docentes', DocenteController::class);
});
