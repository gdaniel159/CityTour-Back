<?php

namespace App\Http\Controllers;

use App\Mail\EnviarContraseña;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    // GET - Obtenemos todos los registros de la base de datos
    public function get()
    {
        $usuarios = Usuario::with('tipo_usuario')->get();
        return response()->json($usuarios);
    }

    // POST - Guardar datos
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Genera una contraseña aleatoria de 10 caracteres
            $password = Str::random(10);

            // Crea el usuario y asigna la contraseña aleatoria
            $usuario = Usuario::create([
                'nombre' => $request->input('nombre'),
                'username' => $request->input('username'),
                'tipo_usuario_id' => $request->input('tipo_usuario_id'),
                'correo' => $request->input('correo'),
                'password' => bcrypt($password), // Hashea la contraseña
            ]);

            // Envía la contraseña por correo electrónico
            Mail::to($request->input('correo'))->send(new EnviarContraseña($password));

            DB::commit();

            return response()->json(['message' => 'Usuario creado correctamente', 'password' => $password], 200);
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

    public function login(Request $request) {

        // Obtener las credenciales del usuario desde la solicitud

        $credentials = $request->only('correo', 'password');
    
        // Intentar autenticar al usuario

        if (auth()->attempt($credentials)) {

            // Autenticación exitosa

            $user = auth()->user();

            if ($user) {
                $verification_code = $user->verified ? 0 : 1;
            }

            // Puedes realizar acciones adicionales aquí, como generar un token de acceso, si estás construyendo una API.
    
            return response()->json(['message' => 'Inicio de sesión exitoso', 'user' => $user, 'verification_code' => $verification_code], 200);

        } else {

            // Autenticación fallida

            return response()->json(['error' => 'Credenciales incorrectas'], 401);

        }
    }
}
