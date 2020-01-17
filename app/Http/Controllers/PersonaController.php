<?php

namespace App\Http\Controllers;

use App\Incidencia;
use App\Operador;
use App\Tecnico;
use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
    public function show($id) {
        $tecnico = Tecnico::all()->where('id',$id);

        return view("perfil", [
            "persona" => $tecnico
        ]);
    }
}
