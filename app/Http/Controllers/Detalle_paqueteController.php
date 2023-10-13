<?php

namespace App\Http\Controllers;

use App\Models\Detalle_paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Detalle_paqueteController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $detalle_paquetes = Detalle_paquete::with('paquete')->get();
        return response()->json($detalle_paquetes);
    }

    // POST - Guardar datos
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $detalle_paquete = Detalle_paquete::create($request->all());
            DB::commit();

            return response()->json(['message' => 'Detalle de paquete creado correctamente', 'detalle_paquete_id'=>$detalle_paquete->id], 200);

        } catch (\Exception $e) {

            DB::rollback();
            return response()->json(["error" => "Error al crear el detalle de paquete: " . $e->getMessage()], 500);
        
        }
    }

    // PUT - Actualizar datos
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $detalle_paquete = Detalle_paquete::find($id);

            if (!$detalle_paquete) {
                return response()->json(['error' => 'Detalle de paquete no encontrado'], 404);
            }

            $detalle_paquete->update($request->all());

            DB::commit();

            return response()->json(['message' => 'Detalle de paquete actualizado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el detalle de paquete: " . $e->getMessage()], 500);
        }
    }

    // DELETE - Eliminar datos
    public function delete(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $detalle_paquete = Detalle_paquete::find($id);

            if (!$detalle_paquete) {
                return response()->json(['error' => 'Detalle de paquete no encontrado'], 404);
            }

            $detalle_paquete->delete();

            DB::commit();

            return response()->json(['message' => 'Detalle de paquete eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar el detalle de paquete: " . $e->getMessage()], 500);
        }
    }
}
