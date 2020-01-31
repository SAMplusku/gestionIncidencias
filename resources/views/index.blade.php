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
            <form class="input-group mb-3 mt-3 w-25 float-right" method="get" action="/">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control " placeholder="Nombre incidencia" name="busqueda">
            </form>

            <div class="collapse navbar-collapse ml-5" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @if(!Request::is('busquedaTrabajadores'))
                        <li class="nav-item mr-3"><a class="nav-link" href="/">Inicio</a>
                        </li> @endif

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            Filtrar Por
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/operador">Operador</a></li>
                            <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/coordinador">Coordinador</a></li>
                            <li class="nav-item"><a class="nav-link" href="/busquedaTrabajadores/gerente">Gerente</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </nav>
        <div class="container">
            @foreach($incidencias as $incidencia)
                <div>
                    <h3><a href="/incidencia/{{$incidencia->id}}">Incidencia - {{$incidencia->id}}</a></h3>
                    Estado: @if($incidencia->estado = 1) <label class="text-success">Abierta </label> @else<label
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
    <script>

        function contactarTrabajador() {
            $.ajax({
                url: "/contactarTrabajador",
                method: 'POST',
                data: {idTrabajador: $('#idTrabajador').val(), mensaje: $('#mensaje').val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:
                    function (data) {
                        $('#mensaje').val("")
                        $('body').removeClass('modal-open');
                    },
                error: function (data) {
                    console.log("Error");
                    console.log(data);
                }
            });
        }

    </script>
@endsection
