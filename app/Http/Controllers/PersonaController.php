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

        $persona = Persona::all()->where('id',$id)->first();
        $tecnico = Tecnico::all()->where('id_persona',$id)->first();
        $incidenciasOperador = Incidencia::all()->where('id_operador',$id)->count();
        $incidenciasTecnico = Incidencia::all()->where('id_tecnico',$id)->count();

        if(Coordinadore::all()->where('id_persona',$id)->count()> 0) {
            return view("perfil", [
                "persona2" => $persona
            ]);
        }

        if (Operadore::where('id_persona','=',$persona->id)->count()> 0 || Tecnico::where('id_persona','=',$persona->id)->count()> 0 ) {
            return view("perfil", [
                "persona" => $tecnico,
                "persona2" => $persona,
                "tecnico" => $incidenciasTecnico,
                "operador" => $incidenciasOperador
            ]);
        }
    }

    public function index(){
        $trabajadores = Persona::all();

        return view('busquedaTrabajadores', [
            'trabajadores' => $trabajadores
        ]);
    }
}
