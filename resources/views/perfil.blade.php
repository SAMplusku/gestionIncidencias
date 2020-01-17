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
                        <strong>Incidencias</strong> 125
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
                                    <input type="text" class="form-control" name="nombre" value="{{$persona->nombre}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Apellidos</h4>
                                    <input type="text" class="form-control" name="apellidos" {{$persona->apellidos}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Telefono</h4>
                                    <input type="text" class="form-control" name="telefono" {{$persona->telefono}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" value="{{$persona->email}}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Direccion</h4>
                                    <input type="text" class="form-control" name="direccion" value="{{$persona->direccion}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Dni</h4>
                                    <input type="text" class="form-control" name="dni" value="{{$persona->dni}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Fecha de nacimiento</h4>
                                    <input type="text" class="form-control" name="fecha">
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
