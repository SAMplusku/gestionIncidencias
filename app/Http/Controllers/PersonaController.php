<?php

namespace App\Http\Controllers;

use App\Taller;
use Illuminate\Http\Request;
use App\Persona;
class PersonaController extends Controller
{
    public function show($id) {
        $persona = Taller::all()->where('id',$id);

        return view("perfil", [
            "persona" => $persona
        ]);
    }
}
