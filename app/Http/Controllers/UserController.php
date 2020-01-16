<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
class UserController extends Controller
{
    public function show(Request $request){

        $user =  Login::where('usuario', request('email'))->where('contraseña', request('password'))->get();
        if ($user != "" || $user != null){

            return view('index', [
                'user' => $user
            ]);
        }else{
            return view('login');
        }

    }
}
