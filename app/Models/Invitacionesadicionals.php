<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacionesadicionals extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
        'invitacion_id',
        'estado'
    ];

    public function personas()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function invitaciones()
    {
        return $this->belongsTo(Invitacions::class, 'invitacion_id');
    }
}
