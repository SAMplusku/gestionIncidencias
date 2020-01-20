@extends('master')
@section('content')
<?php session_start() ?>

    @if(isset($_SESSION['nombre']))
        @if($_SESSION['persona'] == "coordinador" || $_SESSION['persona'] == 'gerente')
            <p><a href="/signup/darAlta">Dar de alta usuario</a></p>
        @endif
        <div>
        <p>{{$_SESSION['nombre']}}</p>
            <p>{{$_SESSION['persona']}}</p>
        </div>
    @else
        <p>No estas loggeado</p>
    @endif

@endsection
