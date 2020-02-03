@extends("master")

@section("content")
    <?php session_start() ?>
    @if($_SESSION['persona'] == 'tecnico' && $_SESSION['id'] == $incidencia->id_tecnico && $incidencia->estado == 1  || $_SESSION['persona'] == 'operador' && $_SESSION['id'] == $incidencia->id_operador && $incidencia->estado == 1)
        <div class="container-fluid p-2" style="margin-bottom: 70px">
            <div class="col-sm-11">
                <h1 class="h2 mb-3 font-weight-normal p-0 m-0 text-center">Incidencia - {{$incidencia->id}}</h1>
                <h5 class="h5 mb-3 font-weight-normal p-0 m-0 text-center mb-4">@if($incidencia->estado == 1)<label
                        class="text-success">Activa </label> @else<label class="text-danger">Cerrada </label> @endif
                </h5>
            </div>
            <form class="form " action="/modificarIncidencia/{{$incidencia->id}}" method="get">
                <div class="float-right col-xs-12 col-sm-6 ">
                    <h2 class="h3 mb-3 font-weight-normal pl-3">Informacion de la incidencia </h2>
                    <input type="hidden" value="{{$incidencia->longitud}}" id="longitud">
                    <input type="hidden" value="{{$incidencia->latitud}}" id="latitud">
                    <input type="hidden" value="{{$tecnico->localizacion}}" id="localizacionTecnico">

                    <h5>Localizacion</h5>
                    <div id="map"></div>
                    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
                    <script>
                        let map = L.map('map').setView([42.866924, -2.676800], 8);

                        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                        }).addTo(map);

                        let latitud = document.getElementById("latitud").value;
                        let longitud = document.getElementById('longitud').value;
                        let localizacionTecnico = document.getElementById('localizacionTecnico').value;

                        console.log(latitud, longitud, localizacionTecnico);

                        let marker = L.marker([longitud, latitud]).addTo(map);

                        let numero1 = localizacionTecnico.substring(0, 17);
                        let numero2 = localizacionTecnico.substring(19);
                        let locTecnico = numero1 + ", " + numero2;

                        L.Routing.control({
                            waypoints: [
                                L.latLng(longitud, latitud),
                                L.latLng(numero1, numero2)
                            ],
                            routeWhileDragging: true
                        }).addTo(map);

                    </script>
                    <br>

                    <div class="form-group col-sm-6">
                        <div class="col-xs-6">
                            <h5>Descripcion</h5>
                            <textarea class="form-control" type="text" name="descripcion"
                                      required>{{$incidencia->descripcion}}</textarea>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <h5>Observaciones</h5>
                            <textarea class="form-control" type="text" name="observacion" placeholder="Observaciones"
                                      required>{{$incidencia->observacion}}</textarea>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <h5>In situ</h5>
                            @if($incidencia->inSitu = 1)
                                <input type="radio" name="inSitu" checked value="1"> Si
                                <input type="radio" name="inSitu" value="0"> No
                            @else
                                <input type="radio" name="inSitu"  value="1"> Si
                                <input type="radio" name="inSitu" checked value="0"> No
                            @endif
                        </div>
                    </div>

                    <h2 class="h3 mb-3 font-weight-normal">Informacion de los trabajadores </h2>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <h5>Tecnico</h5>
                            <input type="text" class="form-control" name="id_tecnico"
                                   value="{{$incidencia->id_tecnico}}">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <h5>Operador</h5>
                            <input type="text" class="form-control" name="id_operador"
                                   value="{{$incidencia->id_operador}}">
                        </div>
                    </div>
                @if($incidencia->estado == 1)
                    <div class="d-flex justify-content-center mb-3" >
                        <button type="submit" class="btn btn-lg btn-success m-1" value="moodificar" name="action">Modificar</button>
                        <button type="submit" name="action" class="btn btn-lg btn-danger m-1">Cerrar</button>
                    </div>
                @endif
            </div>

            <h2 class="h3 mb-3 font-weight-normal pl-3">Informacion del cliente </h2>
                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Nombre</h5>
                    <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
                </div>
            </div>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Apellidos</h5>
                    <input type="text" class="form-control" name="apellidos" value="{{$cliente->apellidos}}">
                </div>
            </div>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Telefono</h5>
                    <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
                </div>
            </div>


                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Direccion</h5>
                    <input type="text" class="form-control" name="direccion" value="{{$cliente->direccion}}">
                </div>
            </div>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Dni</h5>
                    <input type="text" class="form-control" name="dni" value="{{$cliente->dni}}">
                </div>
            </div>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Edad</h5>
                    <input type="text" class="form-control" name="edad" value="{{$cliente->edad}}">
                </div>
            </div>

            <h2 class="h3 mb-3 font-weight-normal">Informacion del vehiculo </h2>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Matricula</h5>
                    <input class="form-control" type="text" name="matricula" value="{{$vehiculo->matricula}}" required>
                </div>
            </div>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Marca</h5>
                    <input class="form-control" type="text" name="marca" value="{{$vehiculo->marca}}" required>
                </div>
            </div>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Modelo</h5>
                    <input class="form-control" type="text" name="modelo" value="{{$vehiculo->modelo}}" required>
                </div>
            </div>

                <div class="form-group col-sm-6">
                    <div class="col-xs-6">
                    <h5>Tipo</h5>
                    <select name="tipo" class="form-control">
                        @if($vehiculo->tipo == "pinchazo")
                            <option value="pinchazo" selected name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        @elseif($vehiculo->tipo == "motor")
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" selected name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        @elseif($vehiculo->tipo == "bateria")
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" selected name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        @elseif($vehiculo->tipo == "golpe")
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" selected name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        @else
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" selected name="tipo">Otros</option>
                        @endif
                    </select>
                </div>
            </div>
        </form>
            @else
                <input type="hidden" value="{{$incidencia->longitud}}" id="longitud">
                <input type="hidden" value="{{$incidencia->latitud}}" id="latitud">
                <input type="hidden" value="{{$tecnico->localizacion}}" id="localizacionTecnico">
                <div class="container-fluid p-2" style="margin-bottom: 70px">
                    <div class="col-sm-11">
                        <h1 class="h2 mb-3 font-weight-normal p-0 m-0 text-center" >Incidencia - {{$incidencia->id}}</h1>
                        <h5 class="h5 mb-3 font-weight-normal p-0 m-0 text-center mb-4">@if($incidencia->estado == 1)<label class="text-success">Activa </label> @else<label class="text-danger">Cerrada </label> @endif</h5>
                    </div>
                    <form class="form" action="" method="get">
                        <div class="float-right col-xs-12 col-sm-6">
                            <h2 class="h3 mb-3 font-weight-normal pl-3">Informacion de la incidencia </h2>
                            <h5>Localizacion</h5>
                            <div id="map"></div>
                            <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
                            <script>
                                let map = L.map('map').setView([42.866924, -2.676800], 8);

                                L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                                    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                                }).addTo(map);

                               let latitud = document.getElementById("latitud").value;
                               let longitud = document.getElementById('longitud').value;
                               let localizacionTecnico = document.getElementById('localizacionTecnico').value;

                               console.log(latitud, longitud, localizacionTecnico);

                                let marker = L.marker([longitud, latitud]).addTo(map);

                                let numero1 = localizacionTecnico.substring(0, 17);
                                let numero2 = localizacionTecnico.substring(19);
                                let locTecnico = numero1 + ", " + numero2;

                                L.Routing.control({
                                    waypoints: [
                                        L.latLng(longitud, latitud),
                                        L.latLng(numero1, numero2)
                                    ],
                                    routeWhileDragging: true
                                }).addTo(map);

                            </script>
                            <br>
                            <div class="form-group ">
                                <div class="col-xs-6">
                                    <h5>Descripcion</h5>
                                    <textarea disabled class="form-control" type="text" name="descripcion"
                                              required>{{$incidencia->descripcion}}</textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-xs-6">
                                    <h5>Observaciones</h5>
                                    <textarea disabled class="form-control" type="text" name="observacion"
                                              placeholder="Observaciones"
                                              required>{{$incidencia->observacion}}</textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-xs-6">
                                    <h5>In situ</h5>
                                    @if($incidencia->inSitu = 1)
                                    <input type="radio" name="inSitu"  disabled checked value="1"> Si
                                    <input type="radio" name="inSitu" disabled value="0"> No
                                        @else
                                        <input type="radio" name="inSitu" disabled value="1"> Si
                                        <input type="radio" name="inSitu" disabled checked value="0"> No
                                        @endif
                                </div>
                            </div>

                            <h2 class="h3 mb-3 font-weight-normal">Informacion de los trabajadores </h2>

                            <div class="form-group ">
                                <div class="col-xs-6">
                                    <h5>Tecnico</h5>
                                    <input type="text" class="form-control" disabled name="id_tecnico"
                                           value="{{$incidencia->id_tecnico}}">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-xs-6">
                                    <h5>Operador</h5>
                                    <input type="text" class="form-control" disabled name="id_operador"
                                           value="{{$incidencia->id_operador}}">
                                </div>
                            </div>
                        </div>

                        <h2 class="h3 mb-3 font-weight-normal pl-3">Informacion del cliente </h2>
                        <div class="form-group col-sm-6">
                            <div class="col-xs-6">
                                <h5>Nombre</h5>
                                <input type="text" class="form-control" disabled name="nombre"
                                       value="{{$cliente->nombre}}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="col-xs-6">
                                <h5>Apellidos</h5>
                                <input type="text" class="form-control" disabled name="apellidos"
                                       value="{{$cliente->apellidos}}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="col-xs-6">
                                <h5>Telefono</h5>
                                <input type="text" class="form-control" disabled name="telefono"
                                       value="{{$cliente->telefono}}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="col-xs-6">
                                <label for="email"><h5>Email</h5></label>
                                <input type="email" class="form-control" disabled name="email"
                                       value="{{$cliente->email}}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="col-xs-6">
                                <h5>Direccion</h5>
                                <input type="text" class="form-control" disabled name="direccion"
                                       value="{{$cliente->direccion}}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="col-xs-6">
                                <h5>Dni</h5>
                                <input type="text" class="form-control" disabled name="dni" value="{{$cliente->dni}}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <div class="col-xs-6">
                                <h5>Edad</h5>
                                <input type="text" class="form-control" disabled name="fecha"
                                       value="{{$cliente->edad}}">
                            </div>
                        </div>

                        <h2 class="h3 mb-3 font-weight-normal">Informacion del vehiculo </h2>

                        <div class="form-group">
                            <div class="form-group col-xs-12 col-md-6">
                                <h5>Matricula</h5>
                                <input class="form-control" type="text" disabled name="matricula"
                                       value="{{$vehiculo->matricula}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-xs-12 col-md-6">
                                <h5>Marca</h5>
                                <input class="form-control" type="text" disabled name="marca"
                                       value="{{$vehiculo->marca}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-xs-12 col-md-6">
                                <h5>Modelo</h5>
                                <input class="form-control" type="text" disabled name="modelo"
                                       value="{{$vehiculo->modelo}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-xs-12 col-md-6">
                                <h5>Tipo</h5>
                                <select name="tipo" class="form-control" disabled>
                                    @if($vehiculo->tipo == "pinchazo")
                                        <option value="pinchazo" selected name="tipo">Pinchazo</option>
                                        <option value="motor" name="tipo">Motor</option>
                                        <option value="bateria" name="tipo">Bateria</option>
                                        <option value="golpe" name="tipo">Golpe</option>
                                        <option value="otros" name="tipo">Otros</option>
                                    @elseif($vehiculo->tipo == "motor")
                                        <option value="pinchazo" name="tipo">Pinchazo</option>
                                        <option value="motor" selected name="tipo">Motor</option>
                                        <option value="bateria" name="tipo">Bateria</option>
                                        <option value="golpe" name="tipo">Golpe</option>
                                        <option value="otros" name="tipo">Otros</option>
                                    @elseif($vehiculo->tipo == "bateria")
                                        <option value="pinchazo" name="tipo">Pinchazo</option>
                                        <option value="motor" name="tipo">Motor</option>
                                        <option value="bateria" selected name="tipo">Bateria</option>
                                        <option value="golpe" name="tipo">Golpe</option>
                                        <option value="otros" name="tipo">Otros</option>
                                    @elseif($vehiculo->tipo == "golpe")
                                        <option value="pinchazo" name="tipo">Pinchazo</option>
                                        <option value="motor" name="tipo">Motor</option>
                                        <option value="bateria" name="tipo">Bateria</option>
                                        <option value="golpe" selected name="tipo">Golpe</option>
                                        <option value="otros" name="tipo">Otros</option>
                                    @else
                                        <option value="pinchazo" name="tipo">Pinchazo</option>
                                        <option value="motor" name="tipo">Motor</option>
                                        <option value="bateria" name="tipo">Bateria</option>
                                        <option value="golpe" name="tipo">Golpe</option>
                                        <option value="otros" selected name="tipo">Otros</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
        </div>
@endsection
