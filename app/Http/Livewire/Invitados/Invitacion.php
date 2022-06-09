<?php

namespace App\Http\Livewire\Invitados;

use Livewire\Component;
use App\Models\Invitacions;
use App\Models\Invitacionesadicionals;

class Invitacion extends Component
{
    public $codigo, $invitacion, $estado, $persona;
    public $invitados = [];

    public function mount()
    {
        $this->invitacion = Invitacions::where('codigo', $this->codigo)->first();
        $this->persona = $this->invitacion->personas->apellido.', '.$this->invitacion->personas->nombre;
        $this->cargo_estado();
        $this->cargo_invitados();
    }

    public function cargo_estado()
    {
        $this->estado = $this->invitacion->estado;
    }

    public function cargo_invitados()
    {
        $this->invitados = Invitacionesadicionals::where('invitacion_id', $this->invitacion->id)->get();
    }
    
    public function invitacion_invitado($invitado_id, $estado)
    {
        if ($estado == 'aceptada') {
            $invitacion = Invitacionesadicionals::where('id', $invitado_id)->update([
                'estado' => 'aceptada'
            ]);
        } else {
            $invitacion = Invitacionesadicionals::where('id', $invitado_id)->update([
                'estado' => 'rechazada'
            ]);
        }
        $this->cargo_invitados();
    }

    public function invitacion($codigo, $estado, $para)
    {
        $invitacion = Invitacions::where('codigo', $codigo)->first();
        if ($para == 'todos') {
            if ($estado == 'aceptada') {
                $invitacions = Invitacions::where('codigo', $codigo)->update([
                    'estado' => 'aceptada'
                ]);
        
                $invitacionesadicionales = Invitacionesadicionals::where('invitacion_id', $invitacion->id)->update([
                    'estado' => 'aceptada'
                ]);        
            } else {
                $invitacions = Invitacions::where('codigo', $codigo)->update([
                    'estado' => 'rechazada'
                ]);
                
                $invitacionesadicionales = Invitacionesadicionals::where('invitacion_id', $invitacion->id)->update([
                    'estado' => 'rechazada'
                ]);
            }
        } elseif($para == 'uno') {
            if ($estado == 'aceptada') {
                $invitacion = Invitacions::where('codigo', $codigo)->update([
                    'estado' => 'aceptada'
                ]);
            } else {
                $invitacion = Invitacions::where('codigo', $codigo)->update([
                    'estado' => 'rechazada'
                ]);
            }
        }
        $this->cargo_invitados();
        $this->estado = $estado;
    }
}
