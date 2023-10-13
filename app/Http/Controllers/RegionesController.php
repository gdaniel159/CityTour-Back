<?php

namespace App\Http\Controllers;

use App\Models\Regiones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionesController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $regiones = Regiones::all();
        return response()->json($regiones);
    }

    // POST - Guardar datos
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $region = Regiones::create($request->all());

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $region->imageUrl = 'images/' . $imageName;
            }

            DB::commit();

            return response()->json(['message' => 'Región creada correctamente'], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al crear la región: " . $e->getMessage()], 500);
        }
    }

    // PUT - Actualizar datos
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $region = Regiones::find($id);

            if (!$region) {
                return response()->json(['error' => 'Región no encontrada'], 404);
            }

            $region->update($request->all());

            DB::commit();

            return response()->json(['message' => 'Región actualizada correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al actualizar la región: " . $e->getMessage()], 500);
        }
    }

    // DELETE - Eliminar datos
    public function delete(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $region = Regiones::find($id);

            if (!$region) {
                return response()->json(['error' => 'Región no encontrada'], 404);
            }

            $region->delete();

            DB::commit();

            return response()->json(['message' => 'Región eliminada correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["error" => "Error al eliminar la región: " . $e->getMessage()], 500);
        }
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destino = Regiones::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('regiones'), $imageName);

            $destino->imageUrl = 'regiones/' . $imageName;
            $destino->save();

            return response()->json(["message","Imagen cargada exitosamente"]);
        }

        return response()->json(["error","Imagen no se cargado correctamente"]);
    }

}
