<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ElementoXPedido extends Model
{
    use HasFactory;

    protected $table = 'elementos_x_pedido';

    public $timestamps = false; // según diagrama no parecen timestamps

    protected $fillable = [
        'pedidos_id',
        'elementos_pp_id',
        'cantidad',
        'precio_unitario',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedidos_id');
    }

    public function elemento()
    {
        return $this->belongsTo(ElementoPP::class, 'elementos_pp_id');
    }
}
