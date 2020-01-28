@extends('master')

@section('content')
    <?php session_start()?>
    <nav class="p-2">
        <div class="">
            <select id="select">
                <option value="IncidenciasDia">Numero incidencias por dia</option>
                <option value="tiempoMedio">Tiempo medio de resolucion</option>
                <option value="inSitu">Resueltas in situ</option>
            </select>

            Tecnico:
            <select name="id_tecnico" class="form-control">
                @foreach($tecnicos as $tecnico)
                    <option value="{{$tecnico->id_persona}}" name="id_tecnico">{{$tecnico->id_persona}}</option>
                @endforeach
            </select>
        </div>
    </nav>

    <canvas id="canvas"></canvas>

    <script>
        let chart;
        $(document).ready(function () {
            if(chart !== undefined)
                chart.destroy()

            $.ajax({
               url: '/estadisticas/cargarGrafica',
               method: 'POST',
                data: {grafico: 'IncidenciasDia'},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    console.log("De puta madre")
                    console.log(data);
                    incidenciaPorDia(data)
                },
                error: function (data) {
                    console.log("Error ");
                    console.log(data);
                }
            });
        });

        function incidenciaPorDia(data) {
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

        $('#select').on('change', function () {
            if(chart !== undefined)
                chart.destroy()
            $.ajax({
                type: 'POST',
                url: '/estadisticas/cargarGrafica',
                data: {grafico: $('#select').val() },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    filtro = $('#select').val()
                    switch (filtro){
                        case 'IncidenciasDia':
                            incidenciaPorDia(data);
                            break;
                        case 'inSitu':
                            resueltasInSitu(data);
                            break;
                        case 'tiempoMedio':
                            tiempoMedio(data);
                            break;
                    }
                },
                error: function (result) {
                    console.log("ERROR");
                    console.log(result);
                }
            });
        });

        function tiempoMedio(data) {
            let $tecnico = [];
            let $dias = [];

            for(let i in data) {
                $tecnico.push(data[i].id_tecnico);
                $dias.push(data[i].dias);
            }
            var chartdata = {
                labels: $dias,
                datasets: [
                    {
                        label: 'Numero incidencias',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: $tecnico
                    }
                ]
            };

            var canvas = $("#canvas");

            var numeroIncidenciasChart = new Chart(canvas, {
                type: 'line',
                data: chartdata
            })
        }
        
        function inSitu() {
            
        }


    </script>
@endsection
<div>

</div>
