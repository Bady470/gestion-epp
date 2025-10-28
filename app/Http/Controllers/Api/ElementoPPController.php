<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ElementoPP;
use Illuminate\Http\Request;

class ElementoPPController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 20);
        $query = ElementoPP::query();

        if ($request->filled('categorias_id')) {
            $query->where('categorias_id', $request->get('categorias_id'));
        }

        return response()->json($query->paginate($perPage));
    }

    public function show($id)
    {
        $elemento = ElementoPP::with('filtro')->find($id);
        if (!$elemento) return response()->json(['message' => 'Elemento no encontrado'], 404);
        return response()->json($elemento);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'icono' => 'nullable|string|max:100',
            'cantidad' => 'nullable|integer',
            'categorias_id' => 'nullable|exists:fichas,id', // según mapeo: apunta a fichas por categorias_id
            'filtros_id' => 'nullable|exists:filtros,id',
        ]);

        $elemento = ElementoPP::create($data);
        return response()->json($elemento, 201);
    }

    public function update(Request $request, $id)
    {
        $elemento = ElementoPP::find($id);
        if (!$elemento) return response()->json(['message' => 'Elemento no encontrado'], 404);

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:150',
            'descripcion' => 'nullable|string',
            'icono' => 'nullable|string|max:100',
            'cantidad' => 'nullable|integer',
            'categorias_id' => 'nullable|exists:fichas,id',
            'filtros_id' => 'nullable|exists:filtros,id',
        ]);

        $elemento->update($data);
        return response()->json($elemento);
    }

    public function destroy($id)
    {
        $elemento = ElementoPP::find($id);
        if (!$elemento) return response()->json(['message' => 'Elemento no encontrado'], 404);
        $elemento->delete();
        return response()->json(['message' => 'Elemento eliminado']);
    }
}
