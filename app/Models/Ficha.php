<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ficha extends Model
{
    use HasFactory;

    protected $table = 'fichas';

    protected $fillable = [
        'numero',
        'programas_id', // FK -> programas.id
        // no incluí 'areas_id' porque según comentarios la categorization fluye por categorias -> areas
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programas_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'fichas_id');
    }

    public function elementos()
    {
        // según tu indicación: ficha está ligado a elemento_pp por 'categorias_id'
        return $this->hasMany(ElementoPP::class, 'categorias_id');
    }
}
