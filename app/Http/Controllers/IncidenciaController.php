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
        $vehiculo = new Vehiculo(
            array(
                'matricula'=>$request->get('matricula'),
                'marca'=>$request->get('marca'),
                'modelo'=>$request->get('modelo'),
            )
        );
        $vehiculo->save();
        $vehiculo2 = Vehiculo::all()->last();
        $cliente = new Cliente(
            array(
                'nombre'=>$request->get('nombrecliente'),
                'dni'=>$request->get('dni'),
                'edad'=>$request->get('edad'),
                'telefono'=>$request->get('telefono'),
                'apellidos'=>$request->get('apellidos'),
                'direccion'=>$request->get('direccion'),
                'id_vehiculo'=>$vehiculo2->id
            )
        );
        $cliente->save();
        $cliente2= Cliente::all()->last();


        $incidencia = new Incidencia(
            array(
                'tipo'=>$request->get('tipo'),
                'fecha'=>$request->get('fecha'),
                'descripcion'=>$request->get('descripcion'),
                'observacion'=>$request->get('observacion'),
                'id_tecnico'=>$request->get('id_tecnico'),
                'id_operador'=>$request->get('id_operador'),
                'id_cliente'=>$cliente2->id
            )
        );

        $incidencia->save();
        return redirect()->route('');
    }
}
