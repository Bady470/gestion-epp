<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programa extends Model
{
    use HasFactory;

    protected $table = 'programas';

    protected $fillable = [
        'nombre',
        'categorias_id', // según tu comentario, referencia a areas
    ];

    public function area()
    {
        // categorias_id apunta a areas
        return $this->belongsTo(Area::class, 'categorias_id');
    }

    public function fichas()
    {
        return $this->hasMany(Ficha::class, 'programas_id');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'programas_id');
    }
}
