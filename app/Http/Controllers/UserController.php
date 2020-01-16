<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class UserController extends Controller
{
   /** public function check(Request $request){

        $user =  Login::where('usuario', request('email'))->where('contraseña', request('password'))->get();
        if ($user != "" || $user != null){

            return view('index', [
                'user' => $user
            ]);
        }else{
            return redirect()->route('login');
        }

    }**/

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
}
