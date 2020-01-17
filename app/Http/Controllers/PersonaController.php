<?php

namespace App\Http\Controllers;


use App\Taller;
use App\Coordinadore;
use App\Login;
use App\Operadore;
use App\Tecnico;

use Illuminate\Http\Request;


class PersonaController extends Controller
{
    public function show($id) {

        $tecnico = Tecnico::all()->where('id',$id);


        return view("perfil", [
            "persona" => $tecnico
        ]);
    }
}
