@extends('master')
@section('content')

<?php
$faker = Faker\Factory::create();

?>

    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Incidencia</h1>

    <div class="d-flex justify-content-center align-items-center card login bg-light">
        <form class="form-signin w-75" action="/anadir" method="get">
            <label>Localizacion</label>

            <label>Cliente</label>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?= $faker->name ?>" required>
            <label>DNI</label>
            <input class="form-control" type="text" name="dni" placeholder="DNI" value=" required>
            <label>Descripcion</label>
            <textarea class="form-control" type="text" name="descripcion" placeholder="Descripcion de la incidencia" required></textarea>
            <label>Tipo</label>
            <select name="tipo" class="form-control">
                <option value="pinchazo" name="tipo">Pinchazo</option>
                <option value="motor" name="tipo">Motor</option>
                <option value="bateria" name="tipo">Bateria</option>
                <option value="golpe" name="tipo">Golpe</option>
                <option value="otros" name="tipo">Otros</option>
            </select>
            <label>Observaciones</label>
            <textarea class="form-control" type="text" name="observaciones" placeholder="Observaciones"
                      required></textarea>
            <br>
            <input type="hidden" name="accion" value="insertar">
            <input type="submit" class="btn btn-primary" value="Añadir">
        </form>
    </div>

@endsection
