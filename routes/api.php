<?php

use App\Http\Controllers\TipoUsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Definicion de rutas

// TIPO DE USUARIO
Route::get('tipo_usuario/get',[TipoUsuarioController::class,'get']);
Route::post('tipo_usuario/create',[TipoUsuarioController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
