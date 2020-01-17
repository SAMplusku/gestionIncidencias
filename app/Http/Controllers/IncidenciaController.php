<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use App\Operadore;
use App\Incidencia;
use App\Cliente;
use App\Tecnico;


class IncidenciaController extends Controller
{

    public function store(Request $request)
    {
        $cliente = new Cliente(
            array(
                'nombre'=>$request->get('nombre'),
                'dni'=>$request->get('dni'),
                'telefono'=>$request->get('telefono'),
                'apellidos'=>$request->get('apellidos'),
                'direccion'=>$request->get('direccion'),
            )
        );

        $vehiculo = new Vehiculo(
            array(
                'matricula'=>$request->get('matricula'),
                'marca'=>$request->get('marca'),
                'modelo'=>$request->get('modelo'),
            )
        );

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
        $cliente->save();
        $vehiculo->save();
        $incidencia->save();
        return redirect()->route('');
    }
}
