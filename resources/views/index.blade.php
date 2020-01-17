@extends('master')
@section('content')
<?php session_start() ?>

    @if(isset($_SESSION['nombre']))
        <div>
        <p>{{$_SESSION['nombre']}}</p>
        </div>
    @else
        <p>No estas loggeado</p>
    @endif

@endsection
