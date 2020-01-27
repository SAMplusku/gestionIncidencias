<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function detalleTecnicos()
    {
        $personas = Persona::all()->where('id');
        $tecnicos = Tecnico::all()->where('id_persona');
        return view('incidencia', [
            'personas' => $personas,
            'tecnicos' => $tecnicos
        ]);
    }
}
