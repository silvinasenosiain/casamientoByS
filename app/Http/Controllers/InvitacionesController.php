<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitacions;

class InvitacionesController extends Controller
{
    public function buscar_invitacion()
    {
        return view('invitados.buscar-invitacion');
    }

    public function invitacion($codigo)
    {
        $validar = Invitacions::where('codigo', $codigo)->first();

        if ($validar != null) {
            return view('invitados.invitacion', compact('codigo'));
        } else {
            abort(404);
        }
    }
}