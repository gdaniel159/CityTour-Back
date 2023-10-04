<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get(){

        $tipo_usuario = TipoUsuario::all();
        return response()->json($tipo_usuario);

    }

    // POST - Guardar datos
    public function store(Request $request){

    }

    // PUT - Actualizar datos

    public function update(Request $request, $id){

    }

    // DELETE - Eliminar datos

    public function delete(Request $request,$id){

    }

}
