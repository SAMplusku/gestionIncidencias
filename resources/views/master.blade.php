<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Road Tech Assistance SL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script rel="stylesheet" src="{{ asset('js/validaciones.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.4.1.js') }}"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
     <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>


    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js"
            integrity="sha512-cMQ5e58BDuu1pr9BQ/eGRn6HaR6Olh0ofcHFWe5XesdCITVuSBiBZZbhCijBe5ya238f/zMMRYIMIIg1jxv4sQ=="
            crossorigin=""></script>


    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css"
          integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
          crossorigin="">
    <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"
            integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ=="
            crossorigin=""></script>


    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css"/>

    <script>
        document
    </script>

</head>
<body>
<!-- Header -->

<nav class="navbar navbar-light bg-light" id="navGrande" style="height: 8%">
    <a class="navbar-brand m-0 float-left mr-2" href="/">
        <img src="https://www.road-tech.com/web/image/res.company/1/logo?unique=e76bbdb" width="80"
             class="d-inline-block align-top" alt="">
    </a>

    @if(isset($_SESSION['id'])  )
        <div class="float-left">
            <nav class="nav ">
                @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente' || $_SESSION['persona'] == 'operador')
                    <a class="nav-link text-dark p-3" href="/incidencia">Añadir Incidencia</a>
                @endif
                @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                    <a class="nav-link text-dark p-3" href="/busquedaTrabajadores">Perfiles</a>
                @endif
                @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                    <a class="nav-link text-dark p-3" href="/estadisticas">Estadísticas</a>
                @endif
                @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                    <a class="nav-link text-dark p-3" href="/register">Dar de alta usuario</a>
                @endif
                @if($_SESSION['persona'] == 'tecnico')
                    <?php
                    $persona = \App\Persona::where('id_login', $_SESSION['id'])->first();
                    $incidencias = \App\Incidencia::all();
                    $notificacion = 0;
                    foreach ($incidencias as $incidencia) {
                        if ($incidencia->id_tecnico == $persona->id) {
                            $notificacion = 1;
                            $idIncidencia = $incidencia->id;
                        }
                    }
                    ?>
                    @if($notificacion == 1)
                        <a href="/incidencia/{{$idIncidencia}}"><img class="noti"
                                                                     src="https://image.flaticon.com/icons/svg/565/565423.svg"
                                                                     style="width: 25%"></a>
                    @else
                        <img src="https://image.flaticon.com/icons/svg/565/565422.svg" style="width: 3%">
                    @endif
                @endif
            </nav>
        </div>


        <div class="btn-group dropdown float-right mt-2" style="margin-right: 60px">

            <button class="btn btn-info  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Menú
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/perfil/{{$_SESSION['id']}}">Perfil</a>
                <a class="dropdown-item" href="/cerrarSesion">Cerrar sesión</a>
            </div>
        </div>
    @endif
</nav>
<nav class="navbar navbar-light bg-light w-100" id="navResponsive">
    <a class="navbar-brand m-0" href="/index">
        <img src="https://www.road-tech.com/web/image/res.company/1/logo?unique=e76bbdb" width="80"
             class="d-inline-block align-top" alt="">
    </a>

    <div class="dropdown show float-right mt-3 pr-5">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ajustes
        </a>

        <div class="dropdown-menu">
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente' || $_SESSION['persona'] == 'operador')
                <a class="nav-link text-dark p-3 dropdown-item" href="/incidencia">Añadir Incidencia</a>
            @endif
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                <a class="nav-link text-dark p-3 dropdown-item" href="/busquedaTrabajadores">Perfiles</a>
            @endif
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                <a class="nav-link text-dark p-3 dropdown-item" href="/estadisticas">Estadísticas</a>
            @endif
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                <a class="nav-link text-dark p-3 dropdown-item" href="/register">Dar de alta usuario</a>
            @endif
            @if($_SESSION['persona'] == 'tecnico')
                <?php
                $persona = \App\Persona::where('id_login', $_SESSION['id'])->first();
                $incidencias = \App\Incidencia::all();
                $notificacion = 0;
                foreach ($incidencias as $incidencia) {
                    if ($incidencia->id_tecnico == $persona->id) {
                        $notificacion = 1;
                        $idIncidencia = $incidencia->id;
                    }
                }
                ?>
                @if($notificacion == 1)
                    <a href="/incidencia/{{$idIncidencia}}"><img class="noti"
                                                                 src="https://image.flaticon.com/icons/svg/565/565423.svg"
                                                                 style="width: 25%"></a>
                @else
                    <img src="https://image.flaticon.com/icons/svg/565/565422.svg" style="width: 3%">
                @endif
            @endif
             <a class="nav-link dropdown-toggle text-dark" href="/busquedaTrabajadores/tecnico" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item " href="/perfil/{{$_SESSION['id']}}">Perfil</a>
                        <a class="dropdown-item " href="/cerrarSesion">Cerrar sesión</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<!-- Container -->

@yield('content')


<!-- Footer -->
<footer class="footer clearfix bg-light">
    <div class="container text-center">
        <span class="text-muted">© 2020 Copyright</span>
        <a href="https://github.com/SAMplusku/gestionIncidencias">GitHub</a>
    </div>
</footer>

<script type="javascript" src="{{ URL::asset('js/mapa.js')}}"></script>
</body>
</html>
