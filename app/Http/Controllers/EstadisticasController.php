<?php

namespace App\Http\Controllers;

use App\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        $tecnicos = Tecnico::all();

        return view('graficos', [
            'tecnicos' => $tecnicos
            ]);
    }
}
