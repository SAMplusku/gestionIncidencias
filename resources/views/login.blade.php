@extends('master')
@section('content')
    <div class="d-flex justify-content-center align-items-center h-75">
        <div class="d-flex justify-content-center align-items-center card login bg-light">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Iniciar sesión</h1>
            <form class="form-signin w-75" action="/login/check" method="get">

                <input type="text" name="email" class="form-control" placeholder="Email" required autofocus><br>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required><br>
                <button class="btn btn-success btn-block" type="submit">Iniciar sesión</button>
                <hr>
                <a class="a" href="/signup"><button class="btn btn-primary btn-block" type="button">Registrarte</button></a>
            </form>
        </div>
    </div>
@endsection
