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
<p>{{Auth::user()}}</p>
    @if(isset($_SESSION['nombre']))
        @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
            <p><a href="/register">Dar de alta usuario</a></p>
        @endif
        <div>
        <p>{{$_SESSION['nombre']}}</p>
            <p>{{$_SESSION['persona']}}</p>
        </div>
    @else
        <p>No estas loggeado</p>
    @endif

@endsection
