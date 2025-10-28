<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Filtro;
use Illuminate\Http\Request;

class FiltroController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 20);
        return response()->json(Filtro::paginate($perPage));
    }

    public function show($id)
    {
        $filtro = Filtro::find($id);
        if (!$filtro) return response()->json(['message' => 'Filtro no encontrado'], 404);
        return response()->json($filtro);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'parte_del_cuerpo' => 'required|string|max:150',
            'meta' => 'nullable|array',
        ]);

        $filtro = Filtro::create($data);
        return response()->json($filtro, 201);
    }

    public function update(Request $request, $id)
    {
        $filtro = Filtro::find($id);
        if (!$filtro) return response()->json(['message' => 'Filtro no encontrado'], 404);

        $data = $request->validate([
            'parte_del_cuerpo' => 'sometimes|required|string|max:150',
            'meta' => 'nullable|array',
        ]);

        $filtro->update($data);
        return response()->json($filtro);
    }

    public function destroy($id)
    {
        $filtro = Filtro::find($id);
        if (!$filtro) return response()->json(['message' => 'Filtro no encontrado'], 404);
        $filtro->delete();
        return response()->json(['message' => 'Filtro eliminado']);
    }
}
