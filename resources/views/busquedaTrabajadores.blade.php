@extends("master")


    @section("content")
                    <div class="main-box clearfix col-lg-12">
                        <div class="dropdown show float-right mt-3 ml-3">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filtrar por
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Trabajo</a>
                                <a class="dropdown-item" href="#">Fecha de creación</a>
                            </div>
                        </div>

                        <div class="input-group mb-3 mt-3 w-25 float-right">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre del usuario" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                            <table class="table listaUsuarios">
                                <thead>
                                <tr>
                                    <th><span>Usuario</span></th>
                                    <th><span>Fecha creacion</span></th>
                                    <th><span>Telefono</span></th>
                                    <th><span>Email</span></th>
                                    <th>

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($trabajadores as $trabajador)

                                    <tr>
                                        <td>
                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="imagenTecnicos">
                                            <a href="perfil/{{$trabajador->id}}" id="linkUsuario">{{$trabajador->nombre}}</a><br>
                                            <span id="tipoTrabajador">
                                                @if(\App\Coordinadore::all()->where('id_persona',$trabajador->id)->count()> 0)
                                                    Coordinador
                                                @elseif(\App\Operadore::where('id_persona','=',$trabajador->id)->count()> 0)
                                                    Operador
                                                @elseif(\App\Tecnico::where('id_persona','=',$trabajador->id)->count()> 0)
                                                    Tecnico
                                                @else
                                                    Gerente
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            {{$trabajador->created_at}}
                                        </td>
                                        <td>
                                            <span class="label label-default">{{$trabajador->telefono}}</span>
                                        </td>
                                        <td>
                                            <a href="#">{{$trabajador->email}}</a>
                                        </td>
                                        <td style="width: 20%;">
                                            <button class="btn btn-success">Contactar</button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                    </div>

    @endsection
