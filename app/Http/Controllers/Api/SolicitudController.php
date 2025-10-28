<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 15);
        return response()->json(Solicitud::paginate($perPage));
    }

    public function show($id)
    {
        $solicitud = Solicitud::with('pedidos')->find($id);
        if (!$solicitud) return response()->json(['message' => 'Solicitud no encontrada'], 404);
        return response()->json($solicitud);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'descripcion' => 'required|string',
            // 'user_id' => 'nullable|exists:usuarios,id' // agrega si aplica
        ]);

        $solicitud = Solicitud::create($data);
        return response()->json($solicitud, 201);
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::find($id);
        if (!$solicitud) return response()->json(['message' => 'Solicitud no encontrada'], 404);

        $data = $request->validate([
            'descripcion' => 'sometimes|required|string',
        ]);

        $solicitud->update($data);
        return response()->json($solicitud);
    }

    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);
        if (!$solicitud) return response()->json(['message' => 'Solicitud no encontrada'], 404);
        $solicitud->delete();
        return response()->json(['message' => 'Solicitud eliminada']);
    }
}
