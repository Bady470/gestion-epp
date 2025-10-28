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
    ];

    public function programas()
    {
        // si programas.categorias_id apunta a areas
        return $this->hasMany(Programa::class, 'categorias_id');
    }
}
