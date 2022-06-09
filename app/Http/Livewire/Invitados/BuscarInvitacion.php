<?php

namespace App\Http\Livewire\Invitados;
use DB;

use Livewire\Component;
use App\Models\Invitacions;

class BuscarInvitacion extends Component
{
    public $invitacion_id, $buscar, $picked = true;
    public $invitaciones = [];

    public function buscarInvitacion()
    {
        $this->picked = false;
    
        $this->invitaciones = Invitacions::join('personas', 'personas.id', 'invitacions.persona_id')
        ->select('invitacions.id', 'invitacions.codigo', 'personas.nombre', 'personas.apellido')
        ->where(DB::raw('CONCAT_WS(" ", personas.apellido, personas.nombre)'), 'LIKE', '%' .$this->buscar. '%')
        ->take(5)
        ->get();      
    }
    
    public function seleccionarInvitacion($invitacion_id)
    {       
        $this->invitacion_id = $invitacion_id; 
        $this->picked = true;
    }
}
