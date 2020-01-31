@extends("master")

@section("content")
    <?php session_start() ?>
    @if($_SESSION['persona'] == 'tecnico' && $_SESSION['id'] == $incidencia->id_tecnico  || $_SESSION['persona'] == 'operador' && $_SESSION['id'] == $incidencia->id_operador )

<<<<<<< HEAD
    <div class="container-fluid p-2">
        <div class="col-sm-11">
            <h1 class="h2 mb-3 font-weight-normal p-0 m-0 text-center" >Incidencia - {{$incidencia->id}}</h1>
            <h5 class="h5 mb-3 font-weight-normal p-0 m-0 text-center mb-4">@if($incidencia->estado = 1)<label class="text-success">Activa </label> @else<label class="text-danger">Cerrada </label> @endif</h5>
        </div>

        <form class="form " action="" method="post">
            <div class="float-right col-xs-12 col-sm-6 w-50">
                <h2 class="h3 mb-3 font-weight-normal pl-3" >Informacion de la incidencia </h2>

                <h5>Localizacion</h5>
                <div id="map"></div>
                <script>
                    let map = L.map('map').setView([42.866924, -2.676800], 8);

                    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                    }).addTo(map);

                    let marker = L.marker([42.866924, -2.676800]).addTo(map);
                </script>
                <br>

                <div class="form-group ">
                    <div class="col-xs-6">
                        <h5>Descripcion</h5>
                        <textarea class="form-control" type="text" name="descripcion" required>{{$incidencia->descripcion}}</textarea>
=======
        <div class="container-fluid p-2" style="margin-bottom: 70px">
            <div class="col-sm-11">
                <h1 class="h2 mb-3 font-weight-normal p-0 m-0 text-center">Incidencia - {{$incidencia->id}}</h1>
                <h5 class="h5 mb-3 font-weight-normal p-0 m-0 text-center mb-4">@if($incidencia->estado = 1)<label
                        class="text-success">Activa </label> @else<label class="text-danger">Cerrada </label> @endif
                </h5>
            </div>

            <form class="form " action="" method="post">
                <div class="float-right col-xs-12 col-sm-6 w-50">
                    <h2 class="h3 mb-3 font-weight-normal pl-3">Informacion de la incidencia </h2>

                    <h5>Localizacion</h5>
                    <div id="map"></div>
                    <script>
                        let map = L.map('map').setView([42.866924, -2.676800], 8);

                        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                        }).addTo(map);

                        let marker = L.marker([42.866924, -2.676800]).addTo(map);
                    </script>
                    <br>

                    <div class="form-group ">
                        <div class="col-xs-6">
                            <h5>Descripcion</h5>
                            <textarea class="form-control" type="text" name="descripcion"
                                      required>{{$incidencia->descripcion}}</textarea>
                        </div>
>>>>>>> a98bca102ab5c0d9470945b9e494e48338208572
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-6">
                            <h5>Observaciones</h5>
                            <textarea class="form-control" type="text" name="observacion" placeholder="Observaciones"
                                      required>{{$incidencia->observacion}}</textarea>
                        </div>
                    </div>

                    <h2 class="h3 mb-3 font-weight-normal">Informacion de los trabajadores </h2>

                    <div class="form-group">
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

                    @if($incidencia->estado = 1)
                        <div class="d-flex justify-content-center mb-3">
                            <button class="btn btn-lg btn-success m-1" type="submit">Modificar</button>
                            <button class="btn btn-lg btn-danger m-1" type="submit">Cerrar</button>
                        </div>
                    @endif
                </div>
            </form>
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
                    <label for="email"><h5>Email</h5></label>
                    <input type="email" class="form-control" name="email" value="{{$cliente->email}}">
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
                    <h5>Fecha de nacimiento</h5>
                    <input type="text" class="form-control" name="fecha" value="{{$cliente->edad}}">
                </div>
            </div>

            <h2 class="h3 mb-3 font-weight-normal">Informacion del vehiculo </h2>

            <div class="form-group">
                <div class="form-group col-sm-6">
                    <h5>Matricula</h5>
                    <input class="form-control" type="text" name="matricula" value="{{$vehiculo->matricula}}" required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group col-sm-6">
                    <h5>Marca</h5>
                    <input class="form-control" type="text" name="marca" value="{{$vehiculo->marca}}" required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group col-sm-6">
                    <h5>Modelo</h5>
                    <input class="form-control" type="text" name="modelo" value="{{$vehiculo->modelo}}" required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group col-sm-6">
                    <h5>Tipo</h5>
                    <select name="tipo" class="form-control">
                        @if($vehiculo->tipo = "pinchazo")
                            <option value="pinchazo" selected name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        @elseif($vehiculo->tipo = "motor")
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" selected name="tipo">Motor</option>
                            <option value="bateria" name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        @elseif($vehiculo->tipo = "bateria")
                            <option value="pinchazo" name="tipo">Pinchazo</option>
                            <option value="motor" name="tipo">Motor</option>
                            <option value="bateria" selected name="tipo">Bateria</option>
                            <option value="golpe" name="tipo">Golpe</option>
                            <option value="otros" name="tipo">Otros</option>
                        @elseif($vehiculo->tipo = "golpe")
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
            @else
                <div class="container-fluid p-2" style="margin-bottom: 70px">
                    <div class="col-sm-11">
<<<<<<< HEAD
                        <h1 class="h2 mb-3 font-weight-normal p-0 m-0 text-center" >Incidencia - {{$incidencia->id}}</h1>
                        <h5 class="h5 mb-3 font-weight-normal p-0 m-0 text-center mb-4">@if($incidencia->estado = 1)<label class="text-success">Activa </label> @else<label class="text-danger">Cerrada </label> @endif</h5>
=======
                        <h1 class="h2 mb-3 font-weight-normal p-0 m-0 text-center">Incidencia - {{$incidencia->id}}</h1>
                        <h5 class="h5 mb-3 font-weight-normal p-0 m-0 text-center mb-4">@if($incidencia->estado = 1)
                                <label class="text-success">Activa </label> @else<label
                                    class="text-danger">Cerrada </label> @endif</h5>
>>>>>>> a98bca102ab5c0d9470945b9e494e48338208572
                    </div>

                    <form class="form" action="" method="post">
                        <div class="float-right col-xs-12 col-sm-6 w-50">
                            <h2 class="h3 mb-3 font-weight-normal pl-3">Informacion de la incidencia </h2>

                            <h5>Localizacion</h5>
                            <div id="map"></div>
                            <script>
                                let map = L.map('map').setView([42.866924, -2.676800], 8);

                                L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                                    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                                }).addTo(map);

                                let marker = L.marker([42.866924, -2.676800]).addTo(map);
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

                            <h2 class="h3 mb-3 font-weight-normal">Informacion de los trabajadores </h2>

                            <div class="form-group">
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
                                <h5>Fecha de nacimiento</h5>
                                <input type="text" class="form-control" disabled name="fecha"
                                       value="{{$cliente->edad}}">
                            </div>
                        </div>

                        <h2 class="h3 mb-3 font-weight-normal">Informacion del vehiculo </h2>

                        <div class="form-group">
                            <div class="form-group col-sm-6">
                                <h5>Matricula</h5>
                                <input class="form-control" type="text" disabled name="matricula"
                                       value="{{$vehiculo->matricula}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-sm-6">
                                <h5>Marca</h5>
                                <input class="form-control" type="text" disabled name="marca"
                                       value="{{$vehiculo->marca}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-sm-6">
                                <h5>Modelo</h5>
                                <input class="form-control" type="text" disabled name="modelo"
                                       value="{{$vehiculo->modelo}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-sm-6">
                                <h5>Tipo</h5>
                                <select name="tipo" class="form-control" disabled>
                                    @if($vehiculo->tipo = "pinchazo")
                                        <option value="pinchazo" selected name="tipo">Pinchazo</option>
                                        <option value="motor" name="tipo">Motor</option>
                                        <option value="bateria" name="tipo">Bateria</option>
                                        <option value="golpe" name="tipo">Golpe</option>
                                        <option value="otros" name="tipo">Otros</option>
                                    @elseif($vehiculo->tipo = "motor")
                                        <option value="pinchazo" name="tipo">Pinchazo</option>
                                        <option value="motor" selected name="tipo">Motor</option>
                                        <option value="bateria" name="tipo">Bateria</option>
                                        <option value="golpe" name="tipo">Golpe</option>
                                        <option value="otros" name="tipo">Otros</option>
                                    @elseif($vehiculo->tipo = "bateria")
                                        <option value="pinchazo" name="tipo">Pinchazo</option>
                                        <option value="motor" name="tipo">Motor</option>
                                        <option value="bateria" selected name="tipo">Bateria</option>
                                        <option value="golpe" name="tipo">Golpe</option>
                                        <option value="otros" name="tipo">Otros</option>
                                    @elseif($vehiculo->tipo = "golpe")
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
