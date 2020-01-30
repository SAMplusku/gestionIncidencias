@extends("master")
<?php session_start() ?>

    @section("content")
                    <div class="main-box clearfix col-lg-12 p-0">

                        <nav class="navbar navbar-expand-md navbar-light bg-light">

                                <form class="input-group mb-3 mt-3 w-25 float-right" method="get" action="/buscadorTrabajadores">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                        <input type="text" class="form-control " placeholder="Nombre del usuario" name="busqueda">
                                </form>

                            <div class="collapse navbar-collapse ml-5" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                    @if(!Request::is('busquedaTrabajadores')) <li class="nav-item mr-3"><a class="nav-link" href="/busquedaTrabajadores">Inicio</a></li> @endif
                        <!--<li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/fecha">Fecha de creacion</a></li>-->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Filtrar Por
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/operador">Operador</a></li>
                                <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/coordinador">Coordinador</a></li>
                                <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/gerente">Gerente</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/busquedaTrabajadores/tecnico" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tecnico </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle">Comunidad</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/alava">Álava</a></li>
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/guipuzcoa">Guipúzcoa</a></li>
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/vizcaya">Vizcaya</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle">Jornada</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/mañana">Mañana</a></li>
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/tarde">Tarde</a></li>
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/noche">Noche</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle">Estado</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/disponible">No disponnible</a></li>
                                                <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/noDisponible">Disponible</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!--<div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown button
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>-->


                </ul>
                </div>
            </nav>
            <table class="table col-lg-12 mx-auto" id="listaUsuarios">
                <thead>
                <tr>
                    <th><span>Usuario</span></th>
                    <th><span>Fecha creacion</span></th>
                    <th><span>Telefono</span></th>
                    <th><span>Email</span></th>
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
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @if(Request::is('busquedaTrabajadores') || Request::is('busquedaTrabajadores/fecha') )
                                    {{$trabajadores->links()}}
                                @endif
                            </ul>
                        </nav>


        </div>
@endsection
