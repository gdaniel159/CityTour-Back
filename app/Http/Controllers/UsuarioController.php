<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    // POST - Guardar datos
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $usuario = Usuario::create($request->all());
            DB::commit();

            return response()->json(['message' => 'Usuario creado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al crear el usuario: " . $e->getMessage()], 500);
        }
    }

    // PUT - Actualizar datos
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $usuario = Usuario::find($id);

            if (!$usuario) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            $usuario->update($request->all());

            DB::commit();

            return response()->json(['message' => 'Usuario actualizado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el usuario: " . $e->getMessage()], 500);
        }
    }

    // DELETE - Eliminar datos
    public function delete(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $usuario = Usuario::find($id);

            if (!$usuario) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            $usuario->delete();

            DB::commit();

            return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar el usuario: " . $e->getMessage()], 500);
        }
    }
}
