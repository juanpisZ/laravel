<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
   protected $fillable = [
    'titulo',
    'descripcion',
    'fecha',
    'user_id',
    'ubicacion',
    'categoria',
    'estado',
    'capacidad',
    'imagen',
];

    protected $casts = [
        'fecha' => 'datetime', 
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function participantes()
    {
        return $this->belongsToMany(User::class, 'evento_user', 'evento_id', 'user_id')
                ->withTimestamps();
    }

    public function eventosInscritos()
    {
        return $this->belongsToMany(Evento::class, 'evento_user')->withTimestamps();
    }

    


}

