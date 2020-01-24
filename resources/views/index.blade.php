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
<div class="container-fluid p-0">
    <div class="row index d-flex justify-content-center">
        @if(isset($_SESSION['nombre']))
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente' || $_SESSION['persona'] == 'operador' || $_SESSION['persona'] == 'tecnico')
                <div class="col-md-6">
                    <div class="jumbotron p-3">
                        <div class="d-flex justify-content-center"><img src="https://estaticos.elperiodico.com/resources/jpg/3/8/fcasals25757716-madrid-autopista-radial-foto-jose-luis-roc161213172509-1481646513783.jpg" style="width: 9em; height: 9em;"class="card-img-top blur d-flex justify-content-center" alt="..."></div><br>
                        <h1 class="d-flex justify-content-center"><a href="/incidencia">Añadir incidencia</a></h1>
                    </div>
                </div>
            @endif
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente' )
                <div class="col-md-6">
                    <div class="jumbotron p-3">
                        <div class="d-flex justify-content-center"><img src="https://us.123rf.com/450wm/bbtreesubmission/bbtreesubmission1709/bbtreesubmission170902685/85678291-hombre-asi%C3%A1tico-y-mujer-en-traje-de-negocios-posando-en-un-estudio-con-gesto.jpg?ver=6" style="width: 9em; height: 9em;"class="card-img-top blur d-flex justify-content-center" alt="..."></div><br>
                        <h1 class="d-flex justify-content-center"><a href="/busquedaTrabajadores">Perfiles</a></h1>
                    </div>
                </div>
            @endif
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                <div class="col-md-6">
                    <div class="jumbotron p-3">
                        <div class="d-flex justify-content-center"><img src="https://eduliticas.com/wp-content/uploads/2015/07/diagrama-de-sectores.png" style="width: 9em; height: 9em;"class="card-img-top blur d-flex justify-content-center" alt="..."></div><br>
                        <h1 class="d-flex justify-content-center">Estadísticas</h1>
                    </div>
                </div>
            @endif
            @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
                <div class="col-md-6">
                    <div class="jumbotron p-3">
                        <div class="d-flex justify-content-center"><img src="https://image.freepik.com/foto-gratis/hombre-mujer-trajes-negocios-estrictos-oficina_85574-2043.jpg" style="width: 9em; height: 9em;"class="card-img-top blur d-flex justify-content-center" alt="..."></div><br>
                        <h1 class="d-flex justify-content-center"><a href="/register">Dar de alta usuario</a></h1>
                    </div>
                </div>
            @endif
        @endif
</div>

@endsection
