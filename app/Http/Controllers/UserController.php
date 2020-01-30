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
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   /*public function check(Request $request){
       session_start();
        $user =  Login::where('usuario', request('email'))->where('contraseña', request('password'))->first();

        if ($user != null){
            $persona= Persona::where('id_login', $user->id)->first();
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
    }*/

    /*public function store(Request $request){
       $persona = new Persona();
       $login = new Login();

       $login->usuario = request('email');
       $login->contraseña = request('password');
       $login->save();
       $login_id = Login::all()->last();
       $persona->nombre = request('name');
       $persona->dni = request('dni');
        $persona->email = request('email');
        $persona->telefono = request('phone');
        $persona->apellidos = request('lastname');
        $persona->edad = request('edad');
        $persona->direccion = request('direccion');
        $persona->foto = 'foto';
        $persona->id_login = $login_id->id;
        $persona->save();

        $tipo = request('tipo');
        if ($tipo == 'operador'){
            $operador = new Operadore();
            $persona_id = Persona::all()->last();
            $operador->id_persona = $persona_id->id;
            $operador->save();
        }elseif ($tipo == "tecnico"){
            $tecnico = new Tecnico();
            $persona_id = Persona::all()->last();
            $tecnico->id_persona = $persona_id->id;
            $tecnico->localizacion = request('localizacion');
            $tecnico->especializacion = request('especializacion');
            $tecnico->jornada = request('jornada');
            $tecnico->disponibilidad = 1;
            $tecnico->save();
        }elseif ($tipo == 'coordinador'){
            $coordinador = new Coordinadore();
            $persona_id = Persona::all()->last();
            $coordinador->id_persona = $persona_id->id;
            $coordinador->save();
        }elseif ($tipo == 'gerente'){
            $gerente = new Gerente();
            $persona_id = Persona::all()->last();
            $gerente->id_persona = $persona_id->id;
            $gerente->save();
        }
        return redirect()->route('index');
    }*/

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
        $mail->AddAddress(request('coordinador'));
        $mail->Send();

        return redirect()->route('login');
    }

    public function cerrarSesion(){
       session_start();
        unset($_SESSION['id']);
        unset($_SESSION['nombre']);
        unset($_SESSION['persona']);
        Auth::logout();
        return Redirect::route('index');
        //Auth::logout();
        //return redirect()->route('login');
    }
    public function subirImagen(Request $request ,$id){
        if ($request->file('image') != null || $request->file('image') != ""){
            $persona = Persona::find($id);
            $image = $request->file('image');
            $input['imagename'] = $persona->email . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);



            $persona->foto = $input['imagename'];

            $persona->save();
            return Redirect::route('perfil', $id);
        }else{
            return Redirect::route('perfil', $id);
        }


    }

}
