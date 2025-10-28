<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 20);
        return response()->json(Programa::paginate($perPage));
    }

    public function show($id)
    {
        $programa = Programa::with(['fichas','usuarios'])->find($id);
        if (!$programa) return response()->json(['message' => 'Programa no encontrado'], 404);
        return response()->json($programa);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:150',
            'categorias_id' => 'nullable|exists:areas,id',
        ]);

        $programa = Programa::create($data);
        return response()->json($programa, 201);
    }

    public function update(Request $request, $id)
    {
        $programa = Programa::find($id);
        if (!$programa) return response()->json(['message' => 'Programa no encontrado'], 404);

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:150',
            'categorias_id' => 'nullable|exists:areas,id',
        ]);

        $programa->update($data);
        return response()->json($programa);
    }

    public function destroy($id)
    {
        $programa = Programa::find($id);
        if (!$programa) return response()->json(['message' => 'Programa no encontrado'], 404);
        $programa->delete();
        return response()->json(['message' => 'Programa eliminado']);
    }
}
