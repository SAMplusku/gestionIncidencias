<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
class PersonaController extends Controller
{
    public function show($id) {
        $persona = Persona::find($id);

        return view("perfil", [
            "persona" => $persona
        ]);
    }
}
