<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $paquetes = Paquete::with('destino')->get();
        return response()->json($paquetes);
    }

    // GET - Obtener por id

    public function getById($id){
        $paquete = Paquete::where('id', $id)->with('destino')->get();
        return response()->json($paquete);
    }

    // POST - Guardar datos
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $paquete = Paquete::create($request->all());
            DB::commit();

            return response()->json(['message' => 'Paquete creado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al crear el paquete: " . $e->getMessage()], 500);
        }
    }

    // PUT - Actualizar datos
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $paquete = Paquete::find($id);

            if (!$paquete) {
                return response()->json(['error' => 'Paquete no encontrado'], 404);
            }

            $paquete->update($request->all());

            DB::commit();

            return response()->json(['message' => 'Paquete actualizado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el paquete: " . $e->getMessage()], 500);
        }
    }

    // DELETE - Eliminar datos
    public function delete(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $paquete = Paquete::find($id);

            if (!$paquete) {
                return response()->json(['error' => 'Paquete no encontrado'], 404);
            }

            $paquete->delete();

            DB::commit();

            return response()->json(['message' => 'Paquete eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar el paquete: " . $e->getMessage()], 500);
        }
    }
}
