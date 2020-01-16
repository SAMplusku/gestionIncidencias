<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operador;
use App\Incidencia;
use App\Cliente;
use App\Tecnico;


class IncidenciaController extends Controller
{


    public function store(Request $request)
    {
        $incidencia = new Incidencia(
            array(
                'localizacion'=>$request->get('localizacion'),
                'tipo'=>$request->get('tipo'),
                'fecha'=>$request->get('fecha'),
                'estado'=>$request->get('estado'),
                'descripcion'=>$request->get('descripcion'),
                'observacion'=>$request->get('observacion'),
                'id_tecnico'=>$request->get('id_tecnico'),
                'id_operador'=>$request->get('id_operador'),
                'id_cliente'=>$request->get('id_cliente')
            )
        );
        $incidencia->save();
        return redirect()->route('');
    }
}
