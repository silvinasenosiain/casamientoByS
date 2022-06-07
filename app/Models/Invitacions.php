<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacions extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
        'estado',
        'codigo'
    ];

    public function personas()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
