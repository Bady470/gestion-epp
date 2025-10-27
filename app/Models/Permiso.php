<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permisos';

    protected $fillable = [
        'nombre',
    ];

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'permisos_x_roles',
            'permisos_id',
            'roles_id'
        );
    }
}
