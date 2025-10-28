<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 15);
        $usuarios = Usuario::paginate($perPage);
        return response()->json($usuarios);
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) return response()->json(['message' => 'Usuario no encontrado'], 404);
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'email' => 'nullable|email|unique:usuarios,email',
            'password' => 'nullable|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:45',
            'roles_id' => 'nullable|exists:roles,id',
            'programas_id' => 'nullable|integer', // si la columna existe la validación real debe reflejar la FK
            'categorias_id' => 'nullable|integer',
            'area_id' => 'nullable|integer',
        ]);

        // Si mandaron password, hashearlo; si no, quitar key
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        // Mapear nombres entrantes a columnas reales: preferimos area_id en BD
        if (isset($data['categorias_id']) && !isset($data['area_id'])) {
            $data['area_id'] = $data['categorias_id'];
            unset($data['categorias_id']);
        }

        // Filtrar solo keys que efectivamente se pueden guardar (fillable)
        $fillable = (new Usuario())->getFillable();
        $data = array_intersect_key($data, array_flip($fillable));

        // Si telefono no viene, garantizamos null para evitar error si columna no acepta NULL aún
        if (!array_key_exists('telefono', $data)) {
            $data['telefono'] = null;
        }

        $usuario = Usuario::create($data);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) return response()->json(['message' => 'Usuario no encontrado'], 404);

        $data = $request->validate([
            'nombre_completo' => 'sometimes|required|string|max:255',
            'email' => ['sometimes','email', Rule::unique('usuarios','email')->ignore($usuario->id)],
            'password' => 'sometimes|nullable|string|min:6|confirmed',
            'telefono' => 'sometimes|nullable|string|max:45',
            'roles_id' => 'sometimes|nullable|exists:roles,id',
            'programas_id' => 'sometimes|nullable|integer',
            'categorias_id' => 'sometimes|nullable|integer',
            'area_id' => 'sometimes|nullable|integer',
        ]);

        if (array_key_exists('password', $data) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        // Mapear categorias_id -> area_id si aplica
        if (isset($data['categorias_id']) && !isset($data['area_id'])) {
            $data['area_id'] = $data['categorias_id'];
            unset($data['categorias_id']);
        }

        // Filtrar por fillable
        $fillable = (new Usuario())->getFillable();
        $data = array_intersect_key($data, array_flip($fillable));

        $usuario->update($data);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) return response()->json(['message' => 'Usuario no encontrado'], 404);
        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado']);
    }
}
