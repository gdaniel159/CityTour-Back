<?php

namespace App\Http\Controllers;

use App\Models\Registro_paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Registro_paqueteController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $registros_paquete = Registro_paquete::all();
        return response()->json($registros_paquete);
    }

    // POST - Guardar datos
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $registro_paquete = Registro_paquete::create($request->all());
            DB::commit();

            return response()->json(['message' => 'Registro de paquete creado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al crear el registro de paquete: " . $e->getMessage()], 500);
        }
    }

    // PUT - Actualizar datos
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $registro_paquete = Registro_paquete::find($id);

            if (!$registro_paquete) {
                return response()->json(['error' => 'Registro de paquete no encontrado'], 404);
            }

            $registro_paquete->update($request->all());

            DB::commit();

            return response()->json(['message' => 'Registro de paquete actualizado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el registro de paquete: " . $e->getMessage()], 500);
        }
    }

    // DELETE - Eliminar datos
    public function delete(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $registro_paquete = Registro_paquete::find($id);

            if (!$registro_paquete) {
                return response()->json(['error' => 'Registro de paquete no encontrado'], 404);
            }

            $registro_paquete->delete();

            DB::commit();

            return response()->json(['message' => 'Registro de paquete eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar el registro de paquete: " . $e->getMessage()], 500);
        }
    }
}
