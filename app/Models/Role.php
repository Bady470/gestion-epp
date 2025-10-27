<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'nombre',
    ];

    public function permisos()
    {
        return $this->belongsToMany(
            Permiso::class,
            'permisos_x_roles',
            'roles_id',
            'permisos_id'
        );
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'roles_id');
    }
}
