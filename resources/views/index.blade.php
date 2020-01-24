@extends('master')
@section('content')
<?php
$user =  App\Login::find(Auth::id());
$persona= App\Persona::where('id_login', $user->id)->first();
session_start();
$_SESSION['id'] = $user->id;
$_SESSION['nombre'] = $persona->nombre;
if (App\Operadore::where('id_persona','=',$persona->id)->count()> 0){
    $_SESSION['persona'] = "operador";
}elseif (App\Tecnico::where('id_persona','=',$persona->id)->count()> 0){
    $_SESSION['persona'] = "tecnico";
}elseif (App\Coordinadore::where('id_persona','=',$persona->id)->count()> 0){
    $_SESSION['persona'] = "coordinador";
}elseif (App\Gerente::where('id_persona','=',$persona->id)->count()> 0){
    $_SESSION['persona'] = "gerente";
}
?>
<div class="row index d-flex justify-content-center">
    @if(isset($_SESSION['nombre']))
        @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente' || $_SESSION['persona'] == 'operador')
            <div class="col-md-6">
                <div class="jumbotron">
                    <h1 class="display-6"><a href="/incidencia">Añadir incidencia</a></h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                </div>
            </div>
        @endif
        @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente' || $_SESSION['persona'] == 'tecnico')
            <div class="col-md-6">
                <div class="jumbotron">
                    <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" style="width: 25%;"class="card-img-top blur d-flex justify-content-center" alt="...">
                    <h1 class="d-flex justify-content-center"><a href="/perfiles">Perfiles</a></h1>
                </div>
            </div>
        @endif
        @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
            <div class="col-md-6">
                <div class="jumbotron">
                    <h1 class="display-6">Estadísticas</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                </div>
            </div>
        @endif
        @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
            <div class="col-md-6">
                <div class="jumbotron">
                    <h1 class="display-6"><a href="/register">Dar de alta usuario</a></h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                </div>
            </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top blur" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Team Member</h5>
                            <div class="card-text text-black-50">Web Developer</div>
                        </div>
                    </div>
                </div>
        @endif
    @endif
</div>
@endsection
