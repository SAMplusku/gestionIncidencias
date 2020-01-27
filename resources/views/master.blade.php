<html>
<head>
    <meta charset="utf-8">
    <title>Road Tech Assistance SL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.4.1.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/index">
        <img src="https://guiadepescado.com/wp-content/uploads/2016/11/boqueron-especie.png" width="40" height="40" class="d-inline-block align-top" alt="">
        Road Tech Assistance SL
    </a>
    @if(isset($_SESSION['id']))
        @if($_SESSION['persona'] == 'tecnico')
            <?php
            $persona = \App\Persona::where('id_login', $_SESSION['id'])->first();
            $incidencias = \App\Incidencia::all();
            $notificacion = 0;
            foreach ($incidencias as $incidencia){
                if ($incidencia->id_tecnico == $persona->id){
                    $notificacion = 1;
                    $idIncidencia = $incidencia->id;
                }
            }

            ?>
            @if($notificacion == 1)
                <a href="/incidencia/{{$idIncidencia}}"><img src="https://image.flaticon.com/icons/svg/565/565423.svg" style="width: 25%"></a>
            @else
                <img src="https://image.flaticon.com/icons/svg/565/565422.svg" style="width: 3%">
            @endif
        @endif
        <div>
            <a href="/perfil/{{$_SESSION['id']}}">Perfil</a>
            <a href="/cerrarSesion">Cerrar sesión</a>
        </div>


    @endif
</nav>
<!-- Container -->

    @yield('content')


<!-- Footer -->
<footer class="footer clearfix">
    <div class="container text-center">
        <span class="text-muted">© 2020 Copyright</span>
        <a href="https://github.com/SAMplusku/gestionIncidencias">GitHub</a>
    </div>
</footer>
<script type="javascript" src="{{ URL::asset('js/mapa.js')}}"></script>
</body>
</html>
