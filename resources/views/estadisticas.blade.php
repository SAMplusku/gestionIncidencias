@extends('master')

@section('content')
    <?php session_start()?>

    <canvas id="canvas" width="400" height="400"></canvas>
    <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph()
        {
            {
                $.post("data.php",
                    function (data)
                    {
                        console.log(data);
                        var incidentes = [];
                        var fechas = [];

                        for (var i in data) {
                            incidentes.push(data[i].numIncidentes);
                            fechas.push(data[i].fechas);
                        }

                        var chartdata = {
                            labels: incidentes,
                            datasets: [
                                {
                                    label: 'Numero incidencias',
                                    backgroundColor: '#49e2ff',
                                    borderColor: '#46d5f1',
                                    hoverBackgroundColor: '#CCCCCC',
                                    hoverBorderColor: '#666666',
                                    data: fechas
                                }
                            ]
                        };

                        var canvas = $("#canvas");

                        var barGraph = new Chart(canvas, {
                            type: 'line',
                            data: chartdata
                        });
                    });
            }
        }
    </script>
@endsection
<div>

</div>

{!! $usersChart->script() !!}
