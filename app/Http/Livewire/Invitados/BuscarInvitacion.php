<?php

namespace App\Http\Livewire\Invitados;
use DB;

use Livewire\Component;
use App\Models\Invitacions;

class BuscarInvitacion extends Component
{
    public $invitacion_id, $buscar;
    public $invitaciones = [];

    public function updatedBuscar($buscar){
        if($this->buscar != ""){
            $this->invitaciones = Invitacions::join('personas', 'personas.id', 'invitacions.persona_id')
            ->select('invitacions.id', 'personas.nombre', 'personas.apellido')
            ->where(DB::raw('CONCAT_WS(" ", personas.apellido, personas.nombre)'), 'LIKE', '%' .$this->buscar. '%')
            ->take(5)
            ->get();
        }
    }
    
    public function seleccionarInvitacion($invitacion_id)
    {       
        $this->invitacion_id = $invitacion_id; 
        $this->buscar = Invitacions::find($invitacion_id)->personas->apellido.', '.Invitacions::find($invitacion_id)->personas->nombre;

        return redirect()->route('invitados.invitacion', ['codigo' => Invitacions::find($invitacion_id)->codigo]);
    }
}
