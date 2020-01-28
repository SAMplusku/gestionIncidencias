<?php

namespace App\Http\Controllers;

use App\Coordinadore;
use App\Incidencia;
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

    public function show(Request $request) {
        $grafico = request()->all()['grafico'];
        $array = array();
        switch ($grafico){
            case 'IncidenciasDia':
                $array = EstadisticasController::incidenciasPorDia();
                break;
            case 'inSitu':
                $array = EstadisticasController::inSitu();
                break;
            case 'tiempoMedio':
                $array = EstadisticasController::tiempoMedio();
                break;
        }
        return $array;
    }

    public function tiempoMedio() {
        $incidencias = DB::table('incidencias')
            ->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(fechafin) - TIME_TO_SEC(created_at))) as dias"),'id_tecnico')
            ->groupBy('id_tecnico')
            ->get();

        return $incidencias;
    }

    public function inSitu() {

    }

    public function incidenciasPorDia() {

        $incidencias = DB::table('incidencias')
            ->select(DB::raw('DATE(created_at) as fechas'), DB::raw('count(*) as numIncidencias'))
            ->groupBy('fechas')
            ->get();

        return $incidencias;
    }

//SELECT count(*), DATE(created_at) FROM incidencias GROUP BY DATE(created_at);
}
