<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filtro extends Model
{
    use HasFactory;

    protected $table = 'filtros';

    protected $fillable = [
        'parte_del_cuerpo', // según la imagen el campo se llama similar
        // otros campos si existen
    ];
}
