<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Redirect;
use App\Coordinadore;
use App\Gerente;
use App\Http\Controllers\Controller;
use App\Login;
use App\Operadore;
use App\Persona;
use App\Providers\RouteServiceProvider;
use App\Tecnico;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $login = new Login();

        $login->email =  $data['email'];
        $login->password = Hash::make($data['password']);
        $login->save();
        $login_id = Login::all()->last();

        $persona = new Persona();
        $persona->nombre = $data['name'];
        $persona->dni =  $data['dni'];
        $persona->email = $data['email'];
        $persona->telefono = $data['phone'];
        $persona->apellidos = $data['lastname'];
        $persona->edad = $data['edad'];
        $persona->direccion = $data['direccion'];
        $persona->foto = 'foto';
        $persona->id_login = $login_id->id;
        $persona->save();

        $persona_id = Persona::all()->last();
        if ($data['tipo'] == 'operador'){
            $operador = new Operadore();
            $operador->id_persona = $persona_id->id;
            $operador->save();
        }elseif ($data['tipo'] == "tecnico"){
            $tecnico = new Tecnico();
            $tecnico->id_persona = $persona_id->id;
            $tecnico->localizacion = $data['localizacion'];
            $tecnico->especializacion = $data['especializacion'];
            $tecnico->jornada = $data['jornada'];
            $tecnico->comunidad = $data['comunidad'];
            $tecnico->disponibilidad = 1;
            $tecnico->save();
        }elseif ($data['tipo'] == 'coordinador'){
            $coordinador = new Coordinadore();
            $coordinador->id_persona = $persona_id->id;
            $coordinador->save();
        }elseif ($data['tipo'] == 'gerente'){
            $gerente = new Gerente();
            $gerente->id_persona = $persona_id->id;
            $gerente->save();
        }

        $user = Login::all()->last();
        return $user;
        //redirect()->route('index');
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


}
