<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ficha;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 15);
        return response()->json(Ficha::paginate($perPage));
    }

    public function show($id)
    {
        $ficha = Ficha::with(['programa','elementos','pedidos'])->find($id);
        if (!$ficha) return response()->json(['message' => 'Ficha no encontrada'], 404);
        return response()->json($ficha);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero' => 'required|string|max:100',
            'programas_id' => 'nullable|exists:programas,id',
        ]);

        $ficha = Ficha::create($data);
        return response()->json($ficha, 201);
    }

    public function update(Request $request, $id)
    {
        $ficha = Ficha::find($id);
        if (!$ficha) return response()->json(['message' => 'Ficha no encontrada'], 404);

        $data = $request->validate([
            'numero' => 'sometimes|required|string|max:100',
            'programas_id' => 'nullable|exists:programas,id',
        ]);

        $ficha->update($data);
        return response()->json($ficha);
    }

    public function destroy($id)
    {
        $ficha = Ficha::find($id);
        if (!$ficha) return response()->json(['message' => 'Ficha no encontrada'], 404);
        $ficha->delete();
        return response()->json(['message' => 'Ficha eliminada']);
    }
}
