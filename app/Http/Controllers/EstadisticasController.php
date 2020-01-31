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

    public function showTecnicos(Reques $request) {
        $grafico = request()->all()['grafico'];
        $id_tecnico = request()->all()['id_tecnico'];
        $array = array();
        switch ($grafico){
            case 'IncidenciasDiaTecnico':
                $array = EstadisticasController::incidenciasPorDiaTecnico($id_tecnico);
                break;
            case 'tiempoMedioTecnico':
                $array = EstadisticasController::tiempoMedioTecnico($id_tecnico);
                break;
            case 'incidenciasHoraTecnico':
                $array = EstadisticasController::incidenciasPorHoraTecnico($id_tecnico);
                break;
            case 'incidenciasMesTecnico':
                $array = EstadisticasController::incidenciasPorMesTecnico($id_tecnico);
                break;
        }
        return $array;
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
            case 'incidenciasHora':
                $array = EstadisticasController::incidenciasPorHora();
                break;
            case 'incidenciasMes':
                $array = EstadisticasController::incidenciasPorMes();
                break;
            case 'incidenciasJornada':
                $array = EstadisticasController::incidenciasPorJornada();
                break;
            case 'incidenciasComunidad':
                $array = EstadisticasController::incidenciasPorComunidad();
                break;
            case 'tiposAveria':
                $array = EstadisticasController::tiposAveria();
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

    public function tiempoMedioTecnico($id_tecnico) {
        $incidencias = DB::table('incidencias')
            ->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(fechafin) - TIME_TO_SEC(created_at))) as dias"),'id_tecnico')
            ->groupBy('id_tecnico')
            ->where('id_tecnico',$id_tecnico)
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

    public function incidenciasPorDiaTecnico($id_tecnico) {
        $incidencias = DB::table('incidencias')
            ->select(DB::raw('DATE(created_at) as fechas'), DB::raw('count(*) as numIncidencias'))
            ->where('id_tecnico',$id_tecnico)
            ->groupBy('fechas')
            ->get();

        return $incidencias;
    }

    public function incidenciasPorHora() {
        $incidencias = DB::table('incidencias')
            ->select(DB::raw('hour(created_at) as fechas'), DB::raw('COUNT(*) as numIncidencias'))
            ->groupBy(DB::raw('hour(created_at)'))
            ->get();

        return $incidencias;
    }

    public function incidenciasPorHoraTecnico($id_tecnico) {
        $incidencias = DB::table('incidencias')
            ->select(DB::raw('hour(created_at) as fechas'), DB::raw('COUNT(*) as numIncidencias'))
            ->where('id_tecnico',$id_tecnico)
            ->groupBy(DB::raw('hour(created_at)'))
            ->get();

        return $incidencias;
    }

    public function incidenciasPorMes() {
        $incidencias = DB::table('incidencias')
            ->select(DB::raw('month(created_at) as fechas'), DB::raw('COUNT(*) as numIncidencias'))
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        return $incidencias;
    }

    public function incidenciasPorMesTecnico($id_tecnico) {
        $incidencias = DB::table('incidencias')
            ->select(DB::raw('month(created_at) as fechas'), DB::raw('COUNT(*) as numIncidencias'))
            ->groupBy(DB::raw('month(created_at)'))
            ->where('id_tecnico',$id_tecnico)
            ->get();

        return $incidencias;
    }

    public function incidenciasPorJornada() {
        $incidencias = DB::table('tecnicos')
            ->select('jornada', DB::raw('COUNT(*) as numIncidencias'))
            ->groupBy('jornada')
            ->get();

        return $incidencias;
    }

    public function tiposAveria() {
        $incidencias = DB::table('incidencias')
            ->select('tipo', DB::raw('COUNT(*) as numIncidencias'))
            ->groupBy('tipo')
            ->get();

        return $incidencias;
    }

    public function incidenciasPorComunidad() {
        $incidencias = DB::table('tecnicos')
            ->select('comunidad', DB::raw('COUNT(*) as numIncidencias'))
            ->groupBy('comunidad')
            ->get();

        return $incidencias;
    }



}
