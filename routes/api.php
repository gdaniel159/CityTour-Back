<?php

use App\Http\Controllers\TipoUsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Definicion de rutas

Route::get('tipo_usuario/get',[TipoUsuarioController::class,'get']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
