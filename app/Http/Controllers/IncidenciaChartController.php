<?php

namespace App\Http\Controllers;

use App\Charts\IncidenciaChart;
use App\Incidencia;
use Illuminate\Http\Request;

class IncidenciaChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersChart = new IncidenciaChart();

        $incidencias = Incidencia::whereDate('created_at', today())->count();
        $fechaIncidencias = Incidencia::all();

        foreach ($fechaIncidencias as $incidencia) {
            $fechaIncidencia = substr($incidencia->created_at,0,10);
            if (!$fechaIncidencia = $incidencia) {
                $usersChart->labels([substr($fechaIncidencias[0]->created_at,0,10)]);
            }
        }

        $usersChart->labels([substr($fechaIncidencias[0]->created_at,0,10)]);
        $usersChart->dataset('Incidencias por mes', 'line', [$incidencias])
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");

        return view('estadisticas', [
            'usersChart' => $usersChart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
