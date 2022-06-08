<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitacionesController extends Controller
{
    public function buscar_invitacion()
    {
        return view('invitados.buscar-invitacion');
    }
}