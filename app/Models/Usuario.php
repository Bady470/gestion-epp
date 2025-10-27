<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre_completo',   
        'email',            
        'password',        
        'roles_id',   
        'categorias_id',     // verificar si es area_id o categoria
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    // Casts básicos (ajusta según tus columnas)
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    // Si 'categorias_id' apunta a 'programas' o 'areas' ajusta el nombre y FK:
    public function categoria()
    {
        // TODO: verifica si 'categorias_id' es en realidad 'area_id' o 'programa_id'
        return $this->belongsTo(Programa::class, 'categorias_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuarios_id');
    }
}
