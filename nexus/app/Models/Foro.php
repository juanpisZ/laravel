<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
