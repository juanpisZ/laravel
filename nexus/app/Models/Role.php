<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'permiso_role');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
