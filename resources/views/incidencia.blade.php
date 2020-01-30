@extends('master')
@section('content')
    <?php
    $faker = Faker\Factory::create();
    session_start();
    $tecnicos = \App\Tecnico::all();
    $personas = \App\Persona::all();
    $localizacionesT = array();
    foreach ($personas as $persona) {
        foreach ($tecnicos as $tecnico) {
            if ($persona->id == $tecnico->id_persona) {
                array_push($localizacionesT, array($persona->id => $tecnico->localizacion));
            }

        }
    }
    ?>

    <h1 class="h2 mb-3 font-weight-normal" style="text-align: center">Incidencia</h1>
    <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 70px">
        <div class="d-flex justify-content-center align-items-center card login bg-light w-75">

            <form class="form-signin w-85" action="/anadir" method="get">
                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Mapa de la incidencia</h2>
                <div id="map"></div>
                <div class="pointer">dsfg</div>
                <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
                <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
                <script type="text/javascript">
                    let map = L.map('map').setView([42.866924, -2.676800], 8);
                    //'http://{s}.tile.osm.org/{z}/{x}/{y}.png'
                    L.control.scale().addTo(map);

                    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                    }).addTo(map);

                    var searchControl = new L.esri.Controls.Geosearch().addTo(map);

                    var results = new L.LayerGroup().addTo(map);

                    searchControl.on('results', function(data){
                        results.clearLayers();
                        for (var i = data.results.length - 1; i >= 0; i--) {
                            results.addLayer(L.marker(data.results[i].latlng));
                        }
                    });

                    setTimeout(function(){$('.pointer').fadeOut('slow');},3400);

                    L.Routing.control({
                        waypoints: [
                            L.latLng(43.17313537107136, -2.751388549804688),
                            L.latLng(42.62587560259137, -2.921676635742188)
                        ],
                        routeWhileDragging: true
                    }).addTo(map);



                    //let popup = L.popup();
                    let marker = L.marker();


                    function onMapClick(e) {
                        /* popup
                             .setLatLng(e.latlng)
                             .setContent(e.latlng.lat.toString() + ", " + e.latlng.lng.toString())
                             .openOn(map);*/

                        marker
                            .setLatLng(e.latlng)
                            .addTo(map);

                        let localizacion1 = e.latlng.lat.toString() + ", " + e.latlng.lng.toString();

                        document.getElementById('localizacion').value = localizacion1;
                        console.log(localizacion1.toString());

                        let locTec = 0;
                        let localizacionesTec ="<?php echo json_encode($localizacionesT);?>";
                        let idtec = document.getElementById('id_tecnico').value;
                        for (let i = 0; i < localizacionesTec.length; i++) {
                            if (localizacionesTec[i][idtec]) {
                                locTec = localizacionesTec[i][idtec];
                            }

                        }

                        console.log(locTec)

                        let numero1 = locTec.substring(0,17);
                        let numero2 = locTec.substring(19);
                        let locTecnico = numero1+ ", "+ numero2;

                        console.log(locTecnico.toString());

                        //https://www.liedman.net/leaflet-routing-machine/tutorials/interaction/
                    }

                    map.on('click', onMapClick);

/*
                    L.Routing.control({
                        waypoints: [
                            L.latLng(43.17313537107136, -2.751388549804688),
                            L.latLng(42.62587560259137, -2.921676635742188)
                        ],
                        routeWhileDragging: true
                    }).addTo(map);
*/

                </script>

                <input type="hidden" id="localizacion" name="localizacion">

                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Operador</h2>
                <label>Operador</label>
                <input class="form-control" type="text" name="id_operador" value="{{$_SESSION['nombre']}}" disabled>
                <input type="hidden" name="id_operador" value="{{$_SESSION['id']}}">
                <input type="hidden" name="fechainicio" value="">
                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Cliente</h2>
                <label>Cliente</label>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="nombrecliente" placeholder="Nombre" autofocus
                               required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="apellidos" placeholder="Apellidos" required>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="number" name="edad" placeholder="Edad" required>
                    </div>

                    <div class="col-md-6">
                        <label>DNI</label>
                        <input class="form-control" type="text" id="dniCliente" name="dni" placeholder="DNI"
                               onchange="existeDni()" required>
                    </div>
                    <div class="col-md-6">
                        <label>Telefono</label>
                        <input class="form-control" type="text" name="telefono" placeholder="Telefono" required>
                    </div>
                </div>
                <label>Direccion</label>
                <input class="form-control" type="text" name="direccion" placeholder="Direccion" required>

                <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Vehiculo</h2>

                <div class="row">
                    <div class="col-md-6">
                        <label>Matricula</label>
                        <input class="form-control" type="text" name="matricula" placeholder="Matricula" required>
                    </div>
                    <div class="col-md-6">
                        <label>Marca</label>
                        <input class="form-control" type="text" name="marca" placeholder="Marca" required>
                    </div>
                    <div class="col-md-6">
                        <label>Modelo</label>
                        <input class="form-control" type="text" name="modelo" placeholder="Modelo" required>
                    </div>
                    <div class="col-md-6">
                        <label>Tipo</label>
                        <select name="tipo" class="form-control">
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        </select>
                    </div>
                </div>
                <label>Descripcion</label>
                <textarea class="form-control" type="text" name="descripcion"
                          placeholder="Descripcion de la incidencia"
                          required></textarea>


                <label>Tecnico</label>

                <select name="id_tecnico" id="id_tecnico" class="form-control">
                    @foreach($tecnicos as $tecnico)
                        @foreach($personas as $persona)
                            @if($tecnico->disponible == 0)
                                @if($tecnico->id_persona == $persona->id)
                                    <option value="{{$tecnico->id_persona}}"
                                            name="id_tecnico">{{$persona->nombre}}</option>


                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </select>

                <label>Observaciones</label>
                <textarea class="form-control" type="text" name="observacion" placeholder="Observaciones"
                          required></textarea>
                <br>
                <input type="hidden" name="accion" value="insertar">
                <input type="submit" class="btn btn-primary" value="Añadir">
            </form>
        </div>
    </div>
    <div id="prueba"></div>
    <script type="text/javascript" src="{{ URL::asset('js/ajax.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
