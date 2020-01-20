@extends("master")

@section("content")
        <div class="col-sm-10 mt-3 d-flex" >
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
                        <strong>Rol: </strong>
                        @if(\App\Coordinadore::all()->where('id_persona',$persona2->id)->count()> 0)
                            Coordinador
                        @elseif(\App\Operadore::where('id_persona','=',$persona2->id)->count()> 0)
                            Operador
                        @elseif(\App\Tecnico::where('id_persona','=',$persona2->id)->count()> 0)
                            Tecnico
                        @else
                            Gerente
                        @endif
                    </li>

                    @if(isset($persona))
                    <li class="list-group-item text-center">
                        <strong>Especializacion: </strong> {{$persona->especializacion}}
                    </li>

                    <li class="list-group-item text-center">
                        <strong>Incidencias</strong> {{$tecnico}}
                    </li>

                    <li class="list-group-item text-center">
                        <strong>Estado: </strong> @if($persona->disponibilidad = 1) <label class="text-success">Disponible </label> @else<label class="text-danger"> No disponible </label>@endif
                    </li>

                     <li class="list-group-item text-center">
                        <strong>Especializacion: </strong> {{$persona->especializacion}}
                     </li>

                     <li class="list-group-item text-center">
                         <strong>Jornada: </strong> {{$persona->jornada}}
                     </li>
                        @endif
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
                                    <input type="text" class="form-control" name="nombre" disabled value="{{$persona2->nombre}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Apellidos</h4>
                                    <input type="text" class="form-control" name="apellidos" disabled value="{{$persona2->apellidos}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Telefono</h4>
                                    <input type="text" class="form-control" name="telefono" disabled value="{{$persona2->telefono}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" disabled value="{{$persona2->email}}" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Direccion</h4>
                                    <input type="text" class="form-control" name="direccion" disabled value="{{$persona2->direccion}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Dni</h4>
                                    <input type="text" class="form-control" name="dni" disabled value="{{$persona2->dni}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <h4>Fecha de nacimiento</h4>
                                    <input type="text" class="form-control" name="fecha" disabled  value="{{$persona2->edad}}">
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
