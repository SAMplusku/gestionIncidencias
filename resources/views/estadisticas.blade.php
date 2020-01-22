@extends('master')

@section('content')
    <?php session_start()?>
    <h1>Grafica del numero de incidencias</h1>

    <div>
        {!! $usersChart->container() !!}
    </div>

    {!! $usersChart->script() !!}
@endsection
