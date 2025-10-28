<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 20);
        return response()->json(Permiso::paginate($perPage));
    }

    public function show($id)
    {
        $permiso = Permiso::with('roles')->find($id);
        if (!$permiso) return response()->json(['message' => 'Permiso no encontrado'], 404);
        return response()->json($permiso);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:45|unique:permisos,nombre',
            'descripcion' => 'nullable|string',
        ]);

        $permiso = Permiso::create($data);
        return response()->json($permiso, 201);
    }

    public function update(Request $request, $id)
    {
        $permiso = Permiso::find($id);
        if (!$permiso) return response()->json(['message' => 'Permiso no encontrado'], 404);

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:45|unique:permisos,nombre,'.$permiso->id,
            'descripcion' => 'nullable|string',
        ]);

        $permiso->update($data);
        return response()->json($permiso);
    }

    public function destroy($id)
    {
        $permiso = Permiso::find($id);
        if (!$permiso) return response()->json(['message' => 'Permiso no encontrado'], 404);
        $permiso->delete();
        return response()->json(['message' => 'Permiso eliminado']);
    }
}
