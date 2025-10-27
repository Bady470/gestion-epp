<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'fecha',
        'usuarios_id',
        'fichas_id',
        'status',
        'comentario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarios_id');
    }

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'fichas_id');
    }

    public function elementos()
    {
        return $this->hasMany(ElementoXPedido::class, 'pedidos_id');
    }

    public function solicitudes()
    {
        return $this->belongsToMany(
            Solicitud::class,
            'pedidos_has_solicitudes',
            'pedidos_id',
            'solicitudes_id'
        );
    }
}
