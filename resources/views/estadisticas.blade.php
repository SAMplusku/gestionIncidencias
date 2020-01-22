@extends('master')

@section('content')
    <h1>Grafica del numero de incidencias</h1>

    <div>
        {!! $usersChart->container() !!}
    </div>

    {!! $usersChart->script() !!}
@endsection
