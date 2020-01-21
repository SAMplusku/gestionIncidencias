<html>
<head>
    <title>Road Tech Assistance SL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-3.4.1.js') }}"></script>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    {{-- ChartScript --}}

</head>
<body>
<!-- Header -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/index">
        <img src="https://guiadepescado.com/wp-content/uploads/2016/11/boqueron-especie.png" width="40" height="40" class="d-inline-block align-top" alt="">
        Road Tech Assistance SL
    </a>
    @if(isset($_SESSION['id']))
        <p>Hola <?php echo $_SESSION['nombre'] ?></p>
        <p><a href="/cerrarSesion">cerrar sesión</a></p>
    @else
        <p><a href="/login">Iniciar sesión</a></p>
    @endif
</nav>
<!-- Container -->
<div class="container-fluid">
    @yield('content')
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container text-center">
        <span class="text-muted">© 2020 Copyright</span>
        <a href="https://github.com/SAMplusku/gestionIncidencias">GitHub</a>
    </div>
</footer>
</body>
</html>
