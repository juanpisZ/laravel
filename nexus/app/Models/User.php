<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Evento;
use App\Models\Foro;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
   
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', 
        ];
    }
    

    // Eventos creados por el usuario (UNO A MUCHOS)
    public function eventosCreados()
    {
        return $this->hasMany(Evento::class, 'user_id');
    }

    // Eventos donde el usuario participa (MUCHOS A MUCHOS)
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_user', 'user_id', 'evento_id')
                ->withTimestamps();
    }


    public function foros() 
    {
        return $this->hasMany(Foro::class, 'user_id');
    }

    // Relacion muchos a muchos con roles
     
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_user');
    }

    public function tieneRol($rol)
    {
        
        if (is_array($rol)) {
        return $this->roles()->whereIn('nombre', $rol)->exists();
        }

        return $this->roles()->where('nombre', $rol)->exists();
    }

    public function tienePermiso($permiso)
    {
      return $this->roles()
        ->whereHas('permisos', function ($q) use ($permiso) {
            $q->where('nombre', $permiso);
        })
        ->exists();
    }

    public function eventosInscritos()
    {
        return $this->belongsToMany(Evento::class, 'evento_user')
                ->withTimestamps();
    }

    


}
