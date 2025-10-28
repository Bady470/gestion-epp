<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 20);
        return response()->json(Role::paginate($perPage));
    }

    public function show($id)
    {
        $role = Role::with('permisos')->find($id);
        if (!$role) return response()->json(['message' => 'Rol no encontrado'], 404);
        return response()->json($role);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:45|unique:roles,nombre',
        ]);

        $role = Role::create($data);
        return response()->json($role, 201);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if (!$role) return response()->json(['message' => 'Rol no encontrado'], 404);

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:45|unique:roles,nombre,'.$role->id,
        ]);

        $role->update($data);
        return response()->json($role);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) return response()->json(['message' => 'Rol no encontrado'], 404);
        $role->delete();
        return response()->json(['message' => 'Rol eliminado']);
    }
}
