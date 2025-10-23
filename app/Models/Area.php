<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'nombre',
        'descripcion', // si existe
    ];

    public function usuarios()
    {
        // si la FK en usuarios es 'categorias_id' apuntando a areas
        return $this->hasMany(Usuario::class, 'categorias_id');
    }

    public function programas()
    {
        // si programas.categorias_id apunta a areas
        return $this->hasMany(Programa::class, 'categorias_id');
    }

    public function fichas()
    {
        // si fichas también referencia areas (ajusta si el nombre de la columna es diferente)
        return $this->hasMany(Ficha::class, 'areas_id'); // TODO: cambiar si la FK real es 'programas_id' u otra
    }
}
