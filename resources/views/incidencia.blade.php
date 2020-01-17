@extends('master')
@section('content')
<?php
$faker = Faker\Factory::create();

?>

    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Incidencia</h1>


    <div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center align-items-center card login bg-light h-120">
        <h1 class="h2 mb-3 font-weight-normal" style="text-align: center">Incidencia</h1>
        <form class="form-signin w-85" action="/anadir" method="get">

            <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Operador</h2>
            <label>Operador</label>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
            <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Cliente</h2>
            <label>Cliente</label>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
            <input class="form-control" type="text" name="apellidos" placeholder="Apellidos" required>
            <label>DNI</label>
            <input class="form-control" type="text" name="dni" placeholder="DNI" required>
            <label>Telefono</label>
            <input class="form-control" type="text" name="telefono" placeholder="Telefono" required>
            <label>Direccion</label>
            <input class="form-control" type="text" name="direccion" placeholder="Direccion" required>
            <label>Descripcion</label>
            <textarea class="form-control" type="text" name="descripcion" placeholder="Descripcion de la incidencia"
                      required></textarea>
            <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Vehiculo</h2>
            <label>Matricula</label>
            <input class="form-control" type="text" name="matricula" placeholder="Matricula" required>
            <label>Marca</label>
            <input class="form-control" type="text" name="marca" placeholder="Marca" required>
            <label>Modelo</label>
            <input class="form-control" type="text" name="modelo" placeholder="Modelo" required>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?= $faker->name ?>" required>
            <label>DNI</label>
            <input class="form-control" type="text" name="dni" placeholder="DNI" value="" required>
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
            <label>Tecnico</label>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>

            <label>Observaciones</label>
            <textarea class="form-control" type="text" name="observaciones" placeholder="Observaciones"
                      required></textarea>
            <br>
            <input type="hidden" name="accion" value="insertar">
            <input type="submit" class="btn btn-primary" value="Añadir">
        </form>
    </div>
    </div>

@endsection
