<?php

namespace App\Http\Controllers;
use App\Coordinadore;
use App\Gerente;
use App\Operadore;
use App\Tecnico;
use Illuminate\Http\Request;
use App\Login;
use App\Persona;
use Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
   public function check(Request $request){
       session_start();
        $user =  Login::where('usuario', request('email'))->where('contraseña', request('password'))->first();

        if ($user != null){
            $persona= Persona::find($user->id);
            $_SESSION['id'] = $user->id;
            $_SESSION['nombre'] = $persona->nombre;

            if (Operadore::where('id_persona','=',$persona->id)->count()> 0){
                $_SESSION['persona'] = "operador";
            }elseif (Tecnico::where('id_persona','=',$persona->id)->count()> 0){
                $_SESSION['persona'] = "tecnico";
            }elseif (Coordinadore::where('id_persona','=',$persona->id)->count()> 0){
                $_SESSION['persona'] = "coordinador";
            }elseif (Gerente::where('id_persona','=',$persona->id)->count()> 0){
                $_SESSION['persona'] = "gerente";
            }
            return redirect()->route('index');
        }else{
            return redirect()->route('login');
        }
    }


    public function enviarEmailCoordinador(Request $request){
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
        $mail->Subject = 'Agregar usuario a la empresa';
        $mail->Body = 'Un nuevo trabajador quiere registrarse en la aplicación. Estos son sus datos: <br>
        nombre -> '.request('name').'<br>Apellidos -> '.request('lastname').'<br>Teléfono -> '.request('phone').'<br>
        DNI -> '.request('dni').'<br>Fecha de nacimiento -> '.request('edad').'<br>Dirección -> '.request('direccion').'<br>
        Email -> '.request('email');
        $mail->AddAddress('arkaitz.galisteo@ikasle.egibide.org');
        $mail->Send();

        return redirect()->route('login');
    }

    public function cerrarSesion(){
       session_start();
        unset($_SESSION['id']);
        unset($_SESSION['nombre']);
        unset($_SESSION['persona']);
        return redirect()->route('index');
    }
}
