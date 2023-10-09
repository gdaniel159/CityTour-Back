<?php
use App\Http\Controllers\TipoUsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Definicion de rutas

// TIPO DE USUARIO
Route::get('tipo_usuario/get',[TipoUsuarioController::class,'get']);
Route::post('tipo_usuario/create',[TipoUsuarioController::class,'store']);
Route::put('tipo_usuario/update/{id}', [TipoUsuarioController::class, 'update']); // Ruta para actualizar
Route::delete('tipo_usuario/delete/{id}', [TipoUsuarioController::class, 'delete']); // Ruta para eliminar

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
