<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoUsuarioController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $tipo_usuario = TipoUsuario::all();
        return response()->json($tipo_usuario);
    }
    // POST - Guardar datos
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            // Obteniendo los datos previamente insertados
            $nombre = $request->nombre;

            // Creamos los datos asignandole el nombre de la tabla y asignado el valor
            $tipo_usuario = TipoUsuario::create([
                'nombre' => $nombre
            ]);

            DB::commit();

            // Retornamos un mensaje
            return response()->json(['message' => 'Tipo de usuario creado correctamente'], 200);
        
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json(["error" => "error " . $e], 500);

        }
    }

    // PUT - Actualizar datos

   public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Obtenemos el tipo de usuario por su ID
            $tipo_usuario = TipoUsuario::find($id);
            
            // Verificamos si el tipo de usuario existe
            if (!$tipo_usuario) {
                return response()->json(['error' => 'Tipo de usuario no encontrado'], 404);
            }
            
            // Actualizamos el nombre si se proporciona en la solicitud
            if ($request->has('nombre')) {
                $tipo_usuario->nombre = $request->nombre;
            }

            // Guardamos los cambios
            $tipo_usuario->save();

            DB::commit();

            // Retornamos un mensaje
            return response()->json(['message' => 'Tipo de usuario actualizado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el tipo de usuario: " . $e->getMessage()], 500);
        }
    }

    // DELETE - Eliminar datos
    public function delete(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Obtenemos el tipo de usuario por su ID
            $tipo_usuario = TipoUsuario::find($id);
            
            // Verificamos si el tipo de usuario existe
            if (!$tipo_usuario) {
                return response()->json(['error' => 'Tipo de usuario no encontrado'], 404);
            }

            // Eliminamos el tipo de usuario
            $tipo_usuario->delete();

            DB::commit();

            // Retornamos un mensaje
            return response()->json(['message' => 'Tipo de usuario eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar el tipo de usuario: " . $e->getMessage()], 500);
        }
    }
}
