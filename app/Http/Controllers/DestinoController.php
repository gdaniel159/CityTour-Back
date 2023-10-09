<?php

namespace App\Http\Controllers;

use App\Models\Destino;
use App\Models\Regiones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinoController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $destinos = Destino::with('regiones')->get();
        return response()->json($destinos);
    }

    // POST - Guardar datos
    public function store(Request $request,$idRegion)
    {
        DB::beginTransaction();

        try {

            $estado = Regiones::where('id',$idRegion)->first();
            
            if(!$estado){
                return response()->json(['message'=>"La region no existe en la base de datos"]);
            }

            $destino = Destino::create([
                'nombre' => $request->nombre,
                'estado' => $request->estado,
                'region_id' => $estado->id
            ]);

            DB::commit();

            return response()->json(['message' => 'Destino creado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al crear el destino: " . $e->getMessage()], 500);
        }
    }

    // PUT - Actualizar datos
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $destino = Destino::find($id);

            if (!$destino) {
                return response()->json(['error' => 'Destino no encontrado'], 404);
            }

            $destino->update($request->all());

            DB::commit();

            return response()->json(['message' => 'Destino actualizado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar el destino: " . $e->getMessage()], 500);
        }
    }

    // DELETE - Eliminar datos
    public function delete(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $destino = Destino::find($id);

            if (!$destino) {
                return response()->json(['error' => 'Destino no encontrado'], 404);
            }

            $destino->delete();

            DB::commit();

            return response()->json(['message' => 'Destino eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar el destino: " . $e->getMessage()], 500);
        }
    }
}
