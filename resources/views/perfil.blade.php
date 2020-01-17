@extends("master")

@section("content")

        <div class="col-sm-10 w-100">
            <h1>Miguel Barros</h1>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle img-thumbnail"><br><br>
                    <label class="btn btn-default bg-info">
                        Cambia de foto <input type="file" hidden>
                    </label>
                </div>
                <br>

                <ul class="list-group">
                    <li class="list-group-item text-center">Actividad</li>
                    <li class="list-group-item text-center">
                        <strong>Incidencias</strong> {{$tecnico}}
                    </li>
                    <li class="list-group-item text-center">
                        <strong>Estado: </strong> @if($persona->disponibilidad = 1) <label class="text-success">Disponible </label> @else<label class="text-danger"> No disponible </label>@endif
                    </li>
                </ul>
            </div>

            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="p-2">
                        <a href="/index">Home</a>
                    </li>

                    <li class="p-2">
                        <a href="">Editar</a>
                    </li>
                </ul><br>

                <div>
                    <div class="active">
                        <form class="form" action="" method="post">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Nombre</h4>
                                    <input type="text" class="form-control" name="nombre" value="{{$persona2->nombre}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Apellidos</h4>
                                    <input type="text" class="form-control" name="apellidos" value="{{$persona2->apellidos}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Telefono</h4>
                                    <input type="text" class="form-control" name="telefono" value="{{$persona2->telefono}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" value="{{$persona2->email}}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Direccion</h4>
                                    <input type="text" class="form-control" name="direccion" value="{{$persona2->direccion}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Dni</h4>
                                    <input type="text" class="form-control" name="dni" value="{{$persona2->dni}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Fecha de nacimiento</h4>
                                    <input type="text" class="form-control" name="fecha" value="{{$persona2->edad}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Especializacion</h4>
                                    <select name="especializacion">
                                        @if($persona->especializacion = "golpe")<option value="golpe" selected>Golpe</option> @else <option value="golpe">Golpe</option> @endif
                                        @if($persona->especializacion = "golpe")<option value="pinchazo" selected>Pinchazo</option> @else <option value="pinchazo">Pinchazo</option> @endif
                                        @if($persona->especializacion = "golpe")<option value="motor" selected>Motor</option> @else <option value="motor">Motor</option>@endif
                                        @if($persona->especializacion = "bateria")<option value="bateria" selected>Bateria</option> @else <option value="bateria">Bateria</option> @endif
                                        @if($persona->especializacion = "otros")<option value="otros" selected>Otros</option> @else <option value="otros">Otros</option>@endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Jornada</h4>
                                    <select name="jornada">
                                        @if($persona->jornada = "mañana")<option value="mañana" selected>Mañana</option> @else <option value="mañana">Mañana</option> @endif
                                        @if($persona->jornada = "tarde")<option value="tarde" selected>Tarde</option> @else <option value="tarde">Tarde</option> @endif
                                        @if($persona->jornada = "noche")<option value="noche" selected>Noche</option> @else <option value="noche">Noche</option> @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12"> <br>
                                    <button class="btn btn-lg btn-success" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>

@endsection
