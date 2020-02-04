@extends('master')

@section('content')
    <?php session_start()?>
    <nav class="p-2">
        <div class="">
            <label class="w-25 mr-4" id="labelGrafica">
                Grafica a elegir:<select id="select" class="form-control">
                    <option value="IncidenciasDia">Numero incidencias por dia</option>
                    <option value="incidenciasHora">Numero incidencias por hora</option>
                    <option value="incidenciasMes">Numero incidencias por mes</option>
                    <option value="tiempoMedio">Tiempo medio de resolucion</option>
                    <option value="incidenciasJornada">Numero de incidencias por jornada</option>
                    <option value="incidenciasComunidad">Numero de incidencias por comunidad</option>
                    <option value="tiposAveria">Tipo de averia</option>
                    <option value="mapaCalor">Mapa de calor</option>
                </select>
            </label>

            <label class="w-25 mr-4" id="labelTecnicos">
                Grafica a elegir por tecnico:
                <select id="selectTecnicos" class="form-control">
                    <option value="IncidenciasDiaTecnico">Numero incidencias por dia</option>
                    <option value="incidenciasHoraTecnico">Numero incidencias por hora</option>
                    <option value="incidenciasMesTecnico">Numero incidencias por mes</option>
                    <option value="tiempoMedioTecnico">Tiempo medio de resolucion</option>
                </select>
            </label>

            <button id="botonTecnicos">Filtrar por tecnico</button>

            <label class="w-25" id="labelIdTecnicos">
                Id tecnico:<select id="selectIdTecnico" name="id_tecnico" class="form-control ">
                    @foreach($tecnicos as $tecnico)
                        <option value="{{$tecnico->id_persona}}" name="id_tecnico">{{$tecnico->id_persona}}</option>
                    @endforeach
                </select>
            </label>

            <button id="volver">Volver</button>

        </div>
    </nav>

    <canvas id="canvas"></canvas>


    <div id="map"></div>

    <script>
        let chart;
        $(document).ready(function () {
            document.getElementById('labelTecnicos').style.display = 'none';

            document.getElementById('labelIdTecnicos').style.display = 'none';

            document.getElementById('volver').style.display = 'none';

            if (chart !== undefined)
                chart.destroy()

            $.ajax({
                url: '/estadisticas/cargarGrafica',
                method: 'POST',
                data: {grafico: 'IncidenciasDia'},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log("Succes")
                    console.log(data);
                    incidenciaPorDia(data)
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        });

        $('#botonTecnicos').on('click', function () {
            document.getElementById('labelGrafica').style.display = 'none';

            document.getElementById('labelTecnicos').style.display = 'block';

            document.getElementById('labelIdTecnicos').style.display = 'block';

            document.getElementById('volver').style.display = 'block';

            document.getElementById('botonTecnicos').style.display = 'none';

            if (chart !== undefined)
                chart.destroy();
            $.ajax({
                url: '/estadisticas/cargarGraficaTecnicos',
                method: 'POST',
                data: {grafico: 'IncidenciasDiaTecnico', id_tecnico: $('#selectIdTecnico').val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log("Succes")
                    console.log(data);
                    incidenciaPorDiaTecnico(data)
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        });

        $('#volver').on('click', function () {
            document.getElementById('labelGrafica').style.display = 'block';

            document.getElementById('labelTecnicos').style.display = 'none';

            document.getElementById('labelIdTecnicos').style.display = 'none';

            document.getElementById('volver').style.display = 'none';

            document.getElementById('botonTecnicos').style.display = 'block';

            if (chart !== undefined)
                chart.destroy();

            $.ajax({
                url: '/estadisticas/cargarGrafica',
                method: 'POST',
                data: {grafico: 'IncidenciasDia'},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log("Succes")
                    console.log(data);
                    incidenciaPorDia(data)
                },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        });

        $('#selectIdTecnico').on('change', function () {
            if (chart !== undefined)
                chart.destroy()
            $.ajax({
                type: 'POST',
                url: '/estadisticas/cargarGraficaTecnicos',
                data: {grafico: $('#selectTecnicos').val(), id_tecnico: $('#selectIdTecnico').val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    filtro = $('#selectTecnicos').val()
                    switch (filtro) {
                        case 'IncidenciasDiaTecnico':
                            incidenciaPorDiaTecnico(data);
                            break;
                        case 'tiempoMedioTecnico':
                            tiempoMedioTecnico(data);
                            break;
                        case 'incidenciasHoraTecnico':
                            incidenciaPorHoraTecnico(data);
                            break;
                        case 'incidenciasMesTecnico':
                            incidenciaPorMesTecnico(data);
                            break;
                    }
                },
                error: function (data) {
                    console.log("ERROR");
                    console.log(data);
                }
            });
        });

        $('#selectTecnicos').on('change', function () {
            if (chart !== undefined)
                chart.destroy()
            $.ajax({
                type: 'POST',
                url: '/estadisticas/cargarGraficaTecnicos',
                data: {grafico: $('#selectTecnicos').val(), id_tecnico: $('#selectIdTecnico').val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    filtro = $('#selectTecnicos').val()
                    switch (filtro) {
                        case 'IncidenciasDiaTecnico':
                            incidenciaPorDiaTecnico(data);
                            break;
                        case 'tiempoMedioTecnico':
                            tiempoMedioTecnico(data);
                            break;
                        case 'incidenciasHoraTecnico':
                            incidenciaPorHoraTecnico(data);
                            break;
                        case 'incidenciasMesTecnico':
                            incidenciaPorMesTecnico(data);
                            break;
                    }
                },
                error: function (data) {
                    console.log("ERROR");
                    console.log(data);
                }
            });
        });

        $('#select').on('change', function () {
            if (chart !== undefined)
                chart.destroy()
            $.ajax({
                type: 'POST',
                url: '/estadisticas/cargarGrafica',
                data: {grafico: $('#select').val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    filtro = $('#select').val()
                    switch (filtro) {
                        case 'IncidenciasDia':
                            incidenciaPorDia(data);
                            break;
                        case 'mapaCalor':
                            mapaCalor(data);
                            break;
                        case 'tiempoMedio':
                            tiempoMedio(data);
                            break;
                        case 'incidenciasHora':
                            incidenciaPorHora(data);
                            break;
                        case 'incidenciasMes':
                            incidenciaPorMes(data);
                            break;
                        case 'incidenciasJornada':
                            incidenciaPorJornada(data);
                            break;
                        case 'incidenciasComunidad':
                            incidenciaPorComunidad(data);
                            break;
                        case 'tiposAveria':
                            tiposAveria(data);
                            break;
                    }
                },
                error: function (data) {
                    console.log("ERROR");
                    console.log(data);
                }
            });
        });

        function incidenciaPorDia(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var fechas = [];

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                fechas.push(data[i].fechas.substring(0, 11));
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

        function incidenciaPorDiaTecnico(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var fechas = [];

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                fechas.push(data[i].fechas.substring(0, 11));
            }

            var chartdata = {
                labels: fechas,
                datasets: [
                    {
                        label: 'Numero incidencias por dia Tecnico',
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

        function incidenciaPorHora(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var fechas = [];

            console.log(data);

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                fechas.push(data[i].fechas);
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

        function incidenciaPorHoraTecnico(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var fechas = [];

            console.log(data);

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                fechas.push(data[i].fechas);
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

        function incidenciaPorMes(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var fechas = [];

            console.log(data);

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                fechas.push(data[i].fechas);
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

        function incidenciaPorMesTecnico(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var fechas = [];

            console.log(data);

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                fechas.push(data[i].fechas);
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

        function incidenciaPorJornada(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var jornada = [];

            console.log(data);

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                jornada.push(data[i].jornada);
            }

            var chartdata = {
                labels: jornada,
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
                type: 'pie',
                data: chartdata
            })
        }

        function incidenciaPorComunidad(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var comunidad = [];

            console.log(data);

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                comunidad.push(data[i].comunidad);
            }

            var chartdata = {
                labels: comunidad,
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
                type: 'pie',
                data: chartdata
            })
        }

        function tiposAveria(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            var incidentes = [];
            var tipo = [];

            console.log(data);

            for (var i in data) {
                incidentes.push(data[i].numIncidencias);
                tipo.push(data[i].tipo);
            }

            var chartdata = {
                labels: tipo,
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
                type: 'pie',
                data: chartdata
            })
        }


        function tiempoMedio(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            let $tecnico = [];
            let $dias = [];

            for (let i in data) {
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

        function tiempoMedioTecnico(data) {
            document.getElementById('canvas').style.display = 'block';
            document.getElementById('map').style.display = 'none';
            if (chart !== undefined)
                chart.destroy()
            let $tecnico = [];
            let $dias = [];

            for (let i in data) {
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

        function mapaCalor(data) {

            //https://esri.github.io/esri-leaflet/examples/visualize-points-as-a-heatmap.html


            /*
                        L.esri.Heat.featureLayer({
                            url: 'https://sampleserver6.arcgisonline.com/arcgis/rest/services/CommunityAddressing/MapServer/0',
                            radius: 10

                        }).addTo(map)

                         */

            document.getElementById('canvas').style.display = 'none';
            document.getElementById('map').style.display = 'block';

            let longitud = [];
            let latitud = [];
            let localizacion = [];

            for (let i in data) {
                latitud.push(data[i].latitud);
                longitud.push(data[i].longitud);

            }
            var addressPoints=[];
            for (let x = 0; x < latitud.length; x++) {
                localizacion=[longitud[x], latitud[x]];
                addressPoints.push(localizacion);
            }

            console.log(addressPoints);
            var localizacionFinal = localizacion.slice()





            let map = L.map('map').setView([42.866924, -2.676800], 8);

            L.esri.basemapLayer('Gray').addTo(map);

            addressPoints = addressPoints.map(function (p) {
                return [p[0], p[1]];
            });

            var heat = L.heatLayer(addressPoints).addTo(map);

        }


    </script>
@endsection
<div>

</div>
