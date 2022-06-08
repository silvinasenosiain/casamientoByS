<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;
use DB;

use Livewire\Component;
use App\Models\Persona;
use App\Models\Invitacions;
use App\Models\Invitacionesadicionals;

class Home extends Component
{
    public $invitacion_id;
    public $apellido, $nombre, $telefono;
    public $apellidoi, $nombrei, $telefonoi;
    public $buscador;

    public function render()
    {
        $invitaciones = Invitacions::join('personas', 'personas.id', 'invitacions.persona_id')
        ->select('invitacions.id', 'personas.apellido', 'personas.nombre', 'invitacions.estado')
        ->where(function ($query) {
            $query->where(DB::raw('CONCAT_WS(" ", personas.apellido, personas.nombre)'), 'LIKE', '%' .$this->buscador. '%')
            ->Orwhere('personas.telefono', 'LIKE', '%' .$this->buscador. '%');
        })->paginate(15);

        return view('livewire.home', compact('invitaciones'));
    }

    public function guardar_invitacion()
    {   
        $this->validate([
            'apellido' => 'required|max:255',
            'nombre' => 'required|max:255',
            'telefono' => 'required',
        ]);

        $code = Str::random(8);

        $existe = Persona::where('telefono', $this->telefono)->count();

        if ($existe > 0) {
            $persona = Persona::where('telefono', $this->telefono)->first();
            Persona::where('telefono', $this->telefono)->update([
                'apellido' => $this->apellido,
                'nombre' => $this->nombre,
            ]);
        } else {
            $persona = Persona::create([
                'apellido' => $this->apellido,
                'nombre' => $this->nombre,
                'telefono' => $this->telefono
            ]);
        }

        $invitado = Invitacions::where('persona_id', $persona->id)->count();

        if ($invitado == 0) {
            $invitacion = Invitacions::create([
                'persona_id' => $persona->id,
                'estado' => 'pendiente',
                'codigo' => $code
            ]);  
        }

        $this->reset();
    }

    public function agregar_invitado($invitacion_id)
    {
        $this->invitacion_id = $invitacion_id;
    }

    public function guardar_invitado()
    {
        $this->validate([
            'apellidoi' => 'required|max:255',
            'nombrei' => 'required|max:255',
            'telefonoi' => 'required',
        ]);

        $existe = Persona::where('telefono', $this->telefonoi)->count();

        if ($existe > 0) {
            $persona = Persona::where('telefono', $this->telefonoi)->first();
            Persona::where('telefono', $this->telefonoi)->update([
                'apellido' => $this->apellidoi,
                'nombre' => $this->nombrei,
            ]);
        } else {
            $persona = Persona::create([
                'apellido' => $this->apellidoi,
                'nombre' => $this->nombrei,
                'telefono' => $this->telefonoi
            ]);
        }

        $invitado = Invitacionesadicionals::where('persona_id', $persona->id)->where('invitacion_id', $this->invitacion_id)->count();

        if ($invitado == 0) {
            $invitado = Invitacionesadicionals::create([
                'persona_id' => $persona->id,
                'invitacion_id' => $this->invitacion_id,
                'estado' => 'pendiente'
            ]);
        }

        $this->reset('apellidoi', 'nombrei', 'telefonoi');
    }
}
