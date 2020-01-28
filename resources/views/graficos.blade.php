@extends('master')

@section('content')
    <?php session_start()?>
    <nav class="p-2">
        <ul class="nav nav-tabs">
            <li class="p-2">
                <button onclick="showGraph()">Numero de incidencias por dia</button>
            </li>
            <li class="p-2">
                <button onclick="tiempoMedio()">Tiempo medio de resolucion</button>
            </li>
            <li class="p-2">
                <button onclick="resueltasInSitu()">Resueltas en in situ</button>
            </li>
        </ul><br>

        <div class="float-left">
            Tecnico: Me cago en dios
            <select name="id_tecnico" class="form-control">
                @foreach($tecnicos as $tecnico)
                    <option value="{{$tecnico->id_persona}}" name="id_tecnico">{{$tecnico->id_persona}}</option>
                @endforeach
            </select>
        </div>
    </nav>

    <canvas id="canvas"></canvas>
    <canvas id="tiempoMedio"></canvas>
    <canvas id="inSitu"></canvas>

    <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph() {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('inSitu').style.display = 'none';
            document.getElementById('tiempoMedio').style.display = 'none';

            $.ajax({
                url: "/data.php",
                method: 'POST',
                dataType: 'json',
                success: function (data) {
                    var incidentes = [];
                    var fechas = [];

                    for (var i in data) {
                        incidentes.push(data[i].numIncidencias);
                        fechas.push(data[i].fechas.substring(0,11));
                    }

                    var chartdata = {
                        labels: fechas,
                        datasets: [
                            {
                                label: 'Numero incidencias',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: incidentes
                            }
                        ]
                    };

                    var canvas = $("#canvas");

                    var numeroIncidenciasChart = new Chart(canvas, {
                        type: 'line',
                        data: chartdata
                    })
                }
            });
        }

        function tiempoMedio() {
            document.getElementById('inSitu').style.display = 'none';
            document.getElementById('canvas').style.display = 'none';
            document.getElementById('tiempoMedio').style.display = 'block';

            $.ajax({
                url: '/tiempoMedio',
                method: 'POST',
                dataType: 'json',
                success: function (data) {
                    var tiempoMedio = [];

                    for(var i in data) {
                        tiempoMedio.push(data[i].tiempoMedio);
                    }

                    var chartdata = {
                        datasets: [
                            {
                                label: 'Numero incidencias',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: tiempoMedio
                            }
                        ]
                    };

                    var canvas = $("#tiempoMedio");

                    var tiempoMedioChart = new Chart(canvas, {
                        type: 'line',
                        data: chartdata
                    })
                }
            })
        }
    </script>
@endsection
<div>

</div>
