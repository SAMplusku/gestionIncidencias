@extends('master')
@section('content')
    <?php
    $user = App\Login::find(Auth::id());
    $persona = App\Persona::where('id_login', $user->id)->first();
    session_cache_limiter('private');
    $cache_limiter = session_cache_limiter();
    session_cache_expire(60);
    $cache_expire = session_cache_expire();
    session_start();
    $_SESSION['id'] = $user->id;
    $_SESSION['nombre'] = $persona->nombre;
    if (App\Operadore::where('id_persona', '=', $persona->id)->count() > 0) {
        $_SESSION['persona'] = "operador";
    } elseif (App\Tecnico::where('id_persona', '=', $persona->id)->count() > 0) {
        $_SESSION['persona'] = "tecnico";
    } elseif (App\Coordinadore::where('id_persona', '=', $persona->id)->count() > 0) {
        $_SESSION['persona'] = "coordinador";
    } elseif (App\Gerente::where('id_persona', '=', $persona->id)->count() > 0) {
        $_SESSION['persona'] = "gerente";
    }
    $incidencias = \App\Incidencia::all();
    ?>

    <div class="main-box clearfix col-lg-12 p-0" style="margin-bottom: 70px">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <form class="input-group mb-3 mt-3 w-25 float-right" method="get" action="/buscadorTrabajadores">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control " placeholder="Nombre del usuario" name="busqueda">
            </form>

            <div class="collapse navbar-collapse ml-5" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @if(!Request::is('busquedaTrabajadores'))
                        <li class="nav-item mr-3"><a class="nav-link" href="/busquedaTrabajadores">Inicio</a>
                        </li> @endif

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            Filtrar Por
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/operador">Operador</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/coordinador">Coordinador</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/gerente">Gerente</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/busquedaTrabajadores/tecnico"
                                   id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false"> Tecnico </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle">Comunidad</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/alava">Álava</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/guipuzcoa">Guipúzcoa</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/vizcaya">Vizcaya</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle">Jornada</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/mañana">Mañana</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/tarde">Tarde</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/busquedaTrabajadores/tecnico/noche">Noche</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle">Estado</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                   href="/busquedaTrabajadores/tecnico/disponible">No disponnible</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="/busquedaTrabajadores/tecnico/noDisponible">Disponible</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </nav>
        <div class="container">
            @foreach($incidencias as $incidencia)
                <div>
                    <h3><a href="/incidencia/{{$incidencia->id}}">Incidencia - {{$incidencia->id}}</a></h3>
                    Estado: @if($incidencia->estado == 1) <label class="text-success">Abierta </label> @else<label
                        class="text-danger"> Cerrada </label>@endif
                    <label class="float-right">Fecha Inicio: {{$incidencia->created_at}}</label> <br>
                    Tipo de incidente: <label class="text-capitalize"> {{$incidencia->tipo}}</label> <br>
                    <div
                        id="descripcionIncidente"> Descripcion: {{$incidencia->descripcion}}
                    </div>
                    <hr>

                </div>
            @endforeach
        </div>

    </div>

@endsection
