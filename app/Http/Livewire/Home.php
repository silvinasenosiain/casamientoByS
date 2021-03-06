<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Persona;
use App\Models\Invitacions;
use App\Models\Invitacionesadicionals;

class Home extends Component
{
    use WithPagination;

    public $invitacion_id;
    public $apellido, $nombre, $telefono;
    public $apellidoi, $nombrei, $telefonoi;
    public $buscador;
    public $pendientes, $aceptados, $rechazados, $total;
    public $invitados = [];

    public function render()
    {
        $invitaciones = Invitacions::join('personas', 'personas.id', 'invitacions.persona_id')
        ->select('invitacions.id', 'personas.apellido', 'personas.nombre', 'invitacions.estado')
        ->where(function ($query) {
            $query->where(DB::raw('CONCAT_WS(" ", personas.apellido, personas.nombre)'), 'LIKE', '%' .$this->buscador. '%')
            ->Orwhere('personas.telefono', 'LIKE', '%' .$this->buscador. '%');
        })->paginate(50);
        $invitaciones->withPath('/home');
        return view('livewire.home', compact('invitaciones'));
    }

    public function mount()
    {
        $this->contar_invitaciones();
    }

    public function contar_invitaciones()
    {
        $pendientes = Invitacions::where('estado', 'pendiente')->count();
        $pendientesi = Invitacionesadicionals::where('estado', 'pendiente')->count();
        $this->pendientes = $pendientes + $pendientesi;

        $aceptados = Invitacions::where('estado', 'aceptada')->count();
        $aceptadosi = Invitacionesadicionals::where('estado', 'aceptada')->count();
        $this->aceptados = $aceptados + $aceptadosi;

        $rechazados = Invitacions::where('estado', 'rechazada')->count();
        $rechazadosi = Invitacionesadicionals::where('estado', 'rechazada')->count();
        $this->rechazados = $rechazados + $rechazadosi;

        $this->total = $this->pendientes + $this->aceptados + $this->rechazados;
    }

    public function guardar_invitacion()
    {   
        $this->validate([
            'apellido' => 'required|max:255',
            'nombre' => 'required|max:255',
        ]);

        $code = Str::random(8);

        $existe = Persona::where('apellido', $this->apellido)->where('nombre', $this->nombre)->count();
  
        if ($existe > 0) {
            $persona = Persona::where('apellido', $this->apellido)->where('nombre', $this->nombre)->first();
            Persona::where('id', $persona->id)->update([
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
        $this->contar_invitaciones();
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
        ]);

        $existe = Persona::where('apellido', $this->apellidoi)->where('nombre', $this->nombrei)->count();

        if ($existe > 0) {
            $persona = Persona::where('apellido', $this->apellidoi)->where('nombre', $this->nombrei)->first();
            Persona::where('id', $persona->id)->update([
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
        $this->contar_invitaciones();
    }

    public function detalle_invitacion($invitacion_id)
    {
        $this->invitados = Invitacionesadicionals::where('invitacion_id', $invitacion_id)->get();
        $this->contar_invitaciones();
    }
}
