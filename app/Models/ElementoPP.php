<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ElementoPP extends Model
{
    use HasFactory;

    protected $table = 'elementos_pp';

    protected $fillable = [
        'nombre',
        'descripcion',
        'icono',
        'cantidad',
        'categorias_id', // conecta con ficha según tu nota
        'filtros_id',
    ];

    protected $casts = [
        'cantidad' => 'integer',
    ];

    public function ficha()
    {
        // Relación: elementos_pp.categorias_id -> fichas.id
        return $this->belongsTo(Ficha::class, 'categorias_id');
    }

    public function filtro()
    {
        return $this->belongsTo(Filtro::class, 'filtros_id');
    }

    public function elementos_x_pedido()
    {
        return $this->hasMany(ElementoXPedido::class, 'elementos_pp_id');
    }
}
