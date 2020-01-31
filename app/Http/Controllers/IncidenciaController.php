<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Vehiculo;
use Illuminate\Http\Request;
use App\Operadore;
use App\Incidencia;
use App\Cliente;
use App\Tecnico;
use PHPMailer\PHPMailer\PHPMailer;


class IncidenciaController extends Controller
{

    public function store(Request $request)
    {
        $vehiculo = new Vehiculo(
            array(
                'matricula' => $request->get('matricula'),
                'marca' => $request->get('marca'),
                'modelo' => $request->get('modelo'),
            )
        );
        $vehiculo->save();
        $vehiculo2 = Vehiculo::all()->last();
        $cliente = new Cliente(
            array(
                'nombre' => $request->get('nombrecliente'),
                'dni' => $request->get('dni'),
                'edad' => $request->get('edad'),
                'telefono' => $request->get('telefono'),
                'apellidos' => $request->get('apellidos'),
                'direccion' => $request->get('direccion'),
                'id_vehiculo' => $vehiculo2->id
            )
        );
        $cliente->save();
        $cliente2 = Cliente::all()->last();


        $incidencia = new Incidencia(
            array(
                'tipo' => $request->get('tipo'),
                'fecha' => $request->get('fecha'),
                'descripcion' => $request->get('descripcion'),
                'observacion' => $request->get('observacion'),
                'localizacion' => $request->get('localizacion'),
                'id_tecnico' => $request->get('id_tecnico'),
                'id_operador' => $request->get('id_operador'),
                'id_cliente' => $cliente2->id
            )
        );

        $incidencia->save();
        $tec = Persona::find($request->get('id_tecnico'));
        $this->contactarTecnico($tec->email);
        return redirect()->route('index');
    }

    public function contactarTecnico($correo)
    {
        $mail = new PHPMailer();
        $mail->isSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML(true);
        $mail->Username = 'samplusku@gmail.com';
        $mail->Password = '12345Abcde';
        $mail->SetFrom('samplusku@gmail.com');
        $mail->Subject = 'Se te ha añadido una inidencia';
        $mail->Body = 'Se te ha añadido una incidencia. Por favor, entra a la aplicación web para obtener más información.<br><a href="homestead.test">Pincha aquí para ir a la página web</a>';
        $mail->AddAddress($correo);
        $mail->Send();
    }

    public function datosCliente()
    {
        $dni = Request('dniCliente');
        $cliente = Incidencia::where('dni', $dni)->first();
        if ($cliente . count() > 0) {
            $datos = array(
                'nombre' => $cliente->nombre,
                'telefono' => $cliente->telefono,
                'apellidos' => $cliente->apellidos,
                'edad' => $cliente->edad,
                'direccion' => $cliente->direccion
            );
            return response()->json($datos, 200);

        } else {
            $datos = array(
                'nombre' => 'msn',
            );
            return response()->json($datos, 200);

        }
    }

    public function show($id)
    {
        $incidencia = Incidencia::all()->where('id', $id)->first();
        $cliente = Cliente::all()->where('id', $incidencia->id_cliente)->first();
        $vehiculo = Vehiculo::all()->where('id', $cliente->id_vehiculo)->first();

        return view("verIncidencia", [
            "incidencia" => $incidencia,
            "cliente" => $cliente,
            "vehiculo" => $vehiculo
        ]);
    }

    public function contactarTecnico($correo)
    {
        $mail = new PHPMailer();
        $mail->isSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML(true);
        $mail->Username = 'samplusku@gmail.com';
        $mail->Password = '12345Abcde';
        $mail->SetFrom('samplusku@gmail.com');
        $mail->Subject = 'Se te ha añadido una inidencia';
        $mail->Body = 'Se te ha añadido una incidencia. Por favor, entra a la aplicación web para obtener más información.<br><a href="homestead.test">Pincha aquí para ir a la página web</a>';
        $mail->AddAddress($correo);
        $mail->Send();
    }
}
