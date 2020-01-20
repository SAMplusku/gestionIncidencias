<?php

namespace App\Http\Controllers;


use App\Taller;
use App\Coordinadore;
use App\Incidencia;
use App\Login;
use App\Operadore;
use App\Persona;
use App\Tecnico;

use Illuminate\Http\Request;


class PersonaController extends Controller
{
    public function show($id) {
      
        $tecnico = Tecnico::all()->where('id_persona',$id);
        $tecnicoPersona = Persona::all()->where('id',$id);
        $incidenciasOperador = Incidencia::all()->where('id_operador',$id)->count();
        $incidenciasTecnico = Incidencia::all()->where('id_tecnico',$id)->count();
      
        return view("perfil", [
            "persona" => $tecnico[0],
            "persona2" => $tecnicoPersona[0],
            "tecnico" => $incidenciasTecnico,
            "operador" => $incidenciasOperador
        ]);
    }
}
