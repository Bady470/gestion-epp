<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 20);
        return response()->json(Area::paginate($perPage));
    }

    public function show($id)
    {
        $area = Area::with(['usuarios','fichas'])->find($id);
        if (!$area) return response()->json(['message' => 'Area no encontrada'], 404);
        return response()->json($area);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
        ]);

        $area = Area::create($data);
        return response()->json($area, 201);
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        if (!$area) return response()->json(['message' => 'Area no encontrada'], 404);

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:150',
            'descripcion' => 'nullable|string',
        ]);

        $area->update($data);
        return response()->json($area);
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        if (!$area) return response()->json(['message' => 'Area no encontrada'], 404);
        $area->delete();
        return response()->json(['message' => 'Area eliminada']);
    }
}
