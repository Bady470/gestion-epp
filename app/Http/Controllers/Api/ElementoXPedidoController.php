<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ElementoXPedido;
use Illuminate\Http\Request;

class ElementoXPedidoController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 20);
        $query = ElementoXPedido::with(['pedido','elemento']);

        if ($request->filled('pedidos_id')) {
            $query->where('pedidos_id', $request->get('pedidos_id'));
        }

        return response()->json($query->paginate($perPage));
    }

    public function show($id)
    {
        $item = ElementoXPedido::with(['pedido','elemento'])->find($id);
        if (!$item) return response()->json(['message' => 'Item no encontrado'], 404);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pedidos_id' => 'required|exists:pedidos,id',
            'elementos_pp_id' => 'required|exists:elementos_pp,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'nullable|numeric',
        ]);

        $item = ElementoXPedido::create($data);
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = ElementoXPedido::find($id);
        if (!$item) return response()->json(['message' => 'Item no encontrado'], 404);

        $data = $request->validate([
            'cantidad' => 'sometimes|required|integer|min:1',
            'precio_unitario' => 'nullable|numeric',
        ]);

        $item->update($data);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = ElementoXPedido::find($id);
        if (!$item) return response()->json(['message' => 'Item no encontrado'], 404);
        $item->delete();
        return response()->json(['message' => 'Item eliminado']);
    }
}
