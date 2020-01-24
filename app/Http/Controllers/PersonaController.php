<?php

namespace App\Http\Controllers;


use App\Gerente;
use App\Taller;
use App\Coordinadore;
use App\Incidencia;
use App\Login;
use App\Operadore;
use App\Persona;
use App\Tecnico;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PersonaController extends Controller
{
    public function show($id) {

        $persona = Persona::all()->where('id',$id)->first();
        $tecnico = Tecnico::all()->where('id_persona',$id)->first();
        $numeroIncidenciasOperador = Incidencia::all()->where('id_operador',$id)->count();
        $numeroIncidenciasTecnico = Incidencia::all()->where('id_tecnico',$id)->count();
        $incidenciasOperador = Incidencia::all()->where('id_operador',$id);
        $incidenciasTecnico = Incidencia::all()->where('id_tecnico',$id);

        if(Coordinadore::all()->where('id_persona',$id)->count()> 0 || Gerente::all()->where('id_persona',$id)->count()> 0) {
            return view("perfil", [
                "persona2" => $persona
            ]);
        }

        if (Operadore::where('id_persona','=',$persona->id)->count()> 0 || Tecnico::where('id_persona','=',$persona->id)->count()> 0 ) {
            return view("perfil", [
                "persona" => $tecnico,
                "persona2" => $persona,
                "tecnico" => $numeroIncidenciasTecnico,
                "operador" => $numeroIncidenciasOperador,
                "incidenciasOperador" => $incidenciasOperador ,
                "incidenciasTecnico" => $incidenciasTecnico
            ]);
        }
    }

    public function index(){
        $trabajadores = Persona::all();

        return view('busquedaTrabajadores', [
            'trabajadores' => $trabajadores
        ]);
    }

    public function showTecnico() {
        $tecnicos = DB::table('tecnicos')->get();
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);

    }

    public function showOperadores() {
        $operadores = DB::table('operadores')->get();
        $personas = [];

        foreach ($operadores as $operador) {
            array_push($personas, Persona::all()->where('id',$operador->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personas
        ]);

    }

    public function showCoordinador() {
        $coordinadores = DB::table('coordinadores')->get();
        $personas = [];

        foreach ($coordinadores as $coordinador) {
            array_push($personas, Persona::all()->where('id',$coordinador->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personas
        ]);

    }

    public function showGerente() {
        $gerentes = DB::table('gerentes')->get();
        $personas = [];

        foreach ($gerentes as $gerente) {
            array_push($personas, Persona::all()->where('id',$gerente->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personas
        ]);

    }

    public function showMañana() {
        $tecnicos = DB::table('tecnicos')->get()->where('jornada','mañana');
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }

    public function showTarde() {
        $tecnicos = DB::table('tecnicos')->get()->where('jornada','tarde');
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }

    public function showNoche() {
        $tecnicos = DB::table('tecnicos')->get()->where('jornada','noche');
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }

    public function showNodisponible() {
        $tecnicos = DB::table('tecnicos')->get()->where('disponibilidad',0);
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }

    public function showFecha() {
        $personas = DB::table('personas')
            ->orderByRaw('updated_at - created_at DESC')
            ->get();

        return view("busquedaTrabajadores", [
            "trabajadores" => $personas
        ]);
    }

    public function showDisponible() {
        $tecnicos = DB::table('tecnicos')->get()->where('disponibilidad',1);
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }

    public function showTrabajadores(Request $request) {

            if($request->get('busqueda')){
                $personas = Persona::where("nombre", "LIKE", "%{$request->get('busqueda')}%")
                    ->paginate(5);
                return view('busquedaTrabajadores',[
                    "trabajadores" => $personas
                ]);
            }
    }

    public function showAlava() {
        $tecnicos = DB::table('tecnicos')->get()->where('comunidad','alava');
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }
    public function showVizcaya() {
        $tecnicos = DB::table('tecnicos')->get()->where('comunidad','vizcaya');
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }
    public function showGuipuzcoa() {
        $tecnicos = DB::table('tecnicos')->get()->where('comunidad','guipuzcoa');
        $personasTecnicos = [];

        foreach ($tecnicos as $tecnico) {
            array_push($personasTecnicos, Persona::all()->where('id',$tecnico->id_persona)->first());
        }

        return view("busquedaTrabajadores", [
            "trabajadores" => $personasTecnicos
        ]);
    }


}
