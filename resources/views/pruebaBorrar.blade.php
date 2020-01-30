@extends('master')
@section('content')
<?php
    $incidencias = \App\Incidencia::all();
?>
<div class="container">
    @foreach($incidencias as $incidencia)
        <div>
            <h3><a href="/incidencia/{{$incidencia->id}}">Incidencia - {{$incidencia->id}}</a></h3>
            Estado: @if($incidencia->estado = 1) <label class="text-success">Abierta </label> @else<label class="text-danger"> Cerrada </label>@endif
            <label class="float-right">Fecha Inicio: {{$incidencia->created_at}}</label> <br>
            Tipo de incidente: <label class="text-capitalize"> {{$incidencia->tipo}}</label> <br>
            <div
                id="descripcionIncidente"> Descripcion: {{$incidencia->descripcion}}
            </div>
            <hr>

        </div>
    @endforeach
</div>




@endsection
