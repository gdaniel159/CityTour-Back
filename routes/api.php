<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\Detalle_paqueteController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\RegionesController;
use App\Http\Controllers\Registro_paqueteController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Definicion de rutas

// TIPO DE USUARIO
Route::get('tipo_usuario/get',[TipoUsuarioController::class,'get']);
Route::post('tipo_usuario/create',[TipoUsuarioController::class,'store']);
Route::put('tipo_usuario/update/{id}', [TipoUsuarioController::class, 'update']); // Ruta para actualizar
Route::delete('tipo_usuario/delete/{id}', [TipoUsuarioController::class, 'delete']); // Ruta para eliminar

// RUTA PARA LOS CLIENTES.
Route::get('cliente/get', [ClienteController::class, 'get']);
Route::post('cliente/create', [ClienteController::class, 'store']);
Route::put('cliente/update/{id}', [ClienteController::class, 'update']);
Route::delete('cliente/delete/{id}', [ClienteController::class, 'delete']);

// RUTA PARA LOS DESTINOS.
Route::get('destino/get', [DestinoController::class, 'get']);
Route::post('destino/create/{idRegion}', [DestinoController::class, 'store']);
Route::put('destino/update/{id}', [DestinoController::class, 'update']);
Route::delete('destino/delete/{id}', [DestinoController::class, 'delete']);

//RUTA PARA LOS DETALLE PAQUETES
Route::get('detalle_paquete/get', [Detalle_paqueteController::class, 'get']);
Route::post('detalle_paquete/create', [Detalle_paqueteController::class, 'store']);
Route::put('detalle_paquete/update/{id}', [Detalle_paqueteController::class, 'update']);
Route::delete('detalle_paquete/delete/{id}', [Detalle_paqueteController::class, 'delete']);

//RUTA PARA LOS PAQUETES
Route::get('paquete/get', [PaqueteController::class, 'get']);
Route::post('paquete/create', [PaqueteController::class, 'store']);
Route::put('paquete/update/{id}', [PaqueteController::class, 'update']);
Route::delete('paquete/delete/{id}', [PaqueteController::class, 'delete']);

//RUTA PARA LAS REGIONES
Route::get('regiones/get', [RegionesController::class, 'get']);
Route::post('regiones/create', [RegionesController::class, 'store']);
Route::put('regiones/update/{id}', [RegionesController::class, 'update']);
Route::delete('regiones/delete/{id}', [RegionesController::class, 'delete']);

//RUTA PARA LOS USUARIOS
Route::get('usuario/get', [UsuarioController::class, 'get']);
Route::post('usuario/create', [UsuarioController::class, 'store']);
Route::put('usuario/update/{id}', [UsuarioController::class, 'update']);
Route::delete('usuario/delete/{id}', [UsuarioController::class, 'delete']);

//RUTA PARA REGISTRO PAQUETE
Route::get('registro_paquete/get', [Registro_paqueteController::class, 'get']);
Route::post('registro_paquete/create', [Registro_paqueteController::class, 'store']);
Route::put('registro_paquete/update/{id}', [Registro_paqueteController::class, 'update']);
Route::delete('registro_paquete/delete/{id}', [Registro_paqueteController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
