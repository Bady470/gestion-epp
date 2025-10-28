<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\ElementoXPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int)$request->get('per_page', 15);
        $query = Pedido::with('usuario','ficha','elementos');

        if ($request->filled('usuarios_id')) {
            $query->where('usuarios_id', $request->get('usuarios_id'));
        }

        return response()->json($query->paginate($perPage));
    }

    public function show($id)
    {
        $pedido = Pedido::with('usuario','ficha','elementos')->find($id);
        if (!$pedido) return response()->json(['message' => 'Pedido no encontrado'], 404);
        return response()->json($pedido);
    }

    /**
     * Store: crea pedido y (opcionalmente) items en elementos_x_pedido.
     * Estructura esperada para items:
     * items: [
     *   { elementos_pp_id: 1, cantidad: 2, precio_unitario: 100.50 },
     *   ...
     * ]
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha' => 'nullable|date',
            'usuarios_id' => 'required|exists:usuarios,id',
            'fichas_id' => 'nullable|exists:fichas,id',
            'status' => 'nullable|string|max:100',
            'comentario' => 'nullable|string',
            'items' => 'nullable|array',
            'items.*.elementos_pp_id' => 'required_with:items|exists:elementos_pp,id',
            'items.*.cantidad' => 'required_with:items|integer|min:1',
            'items.*.precio_unitario' => 'nullable|numeric',
        ]);

        DB::beginTransaction();
        try {
            $pedido = Pedido::create([
                'fecha' => $data['fecha'] ?? now(),
                'usuarios_id' => $data['usuarios_id'],
                'fichas_id' => $data['fichas_id'] ?? null,
                'status' => $data['status'] ?? 'pending',
                'comentario' => $data['comentario'] ?? null,
            ]);

            if (!empty($data['items'])) {
                foreach ($data['items'] as $item) {
                    ElementoXPedido::create([
                        'pedidos_id' => $pedido->id,
                        'elementos_pp_id' => $item['elementos_pp_id'],
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio_unitario'] ?? null,
                    ]);
                }
            }

            DB::commit();
            return response()->json($pedido->load('elementos'), 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error creando pedido', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) return response()->json(['message' => 'Pedido no encontrado'], 404);

        $data = $request->validate([
            'fecha' => 'sometimes|date',
            'usuarios_id' => 'sometimes|exists:usuarios,id',
            'fichas_id' => 'sometimes|exists:fichas,id',
            'status' => 'sometimes|string|max:100',
            'comentario' => 'nullable|string',
            // Para items: recomendamos endpoints separados para modificar items
        ]);

        $pedido->update($data);
        return response()->json($pedido->fresh());
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) return response()->json(['message' => 'Pedido no encontrado'], 404);

        // Si quieres eliminar items manualmente:
        // $pedido->elementos()->delete();

        $pedido->delete();
        return response()->json(['message' => 'Pedido eliminado']);
    }
}
