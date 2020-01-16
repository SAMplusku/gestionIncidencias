<html>
<head>
    <title>Road Tech Assistance SL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
<!-- Header -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="https://anytech365.com/wp-content/uploads/2019/02/AnyTech365_vertical-transparent.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Road Tech Assistance SL
    </a>
</nav>
<!-- Container -->
<div class="container-fluid" >
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
