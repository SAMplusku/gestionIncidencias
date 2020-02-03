@extends('master')
@section('content')
    <div class="d-flex justify-content-center align-items-center divSign">
        <div class="d-flex justify-content-center align-items-center card signup bg-light">
            <h3>Enviar datos al coordinador</h3>
            <form class="form-signin w-75" action="/signup/sendMail" method="get" onsubmit="//return validacionsignup()">
                <input type="text" id="nombre" name="name" class="form-control" placeholder="Nombre" required autofocus><br>
                <input type="text" id="apellido" name="lastname" class="form-control" placeholder="Apellidos"
                       required><br>
                <input type="text" id="telefono" name="phone" class="form-control" placeholder="Teléfono" required><br>
                <input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" required><br>
                <input type="number" id="edad" name="edad" class="form-control" min="18" max="65" placeholder="Edad"
                       required><br>
                <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección "
                       required><br>
                <!--<label class="btn btn-default bg-info">
                    Subir foto de perfil <input type="file" hidden>
                </label>-->
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" required><br>
                <select id="coordinador" name="coordinador" class="form-control">
                    <option disabled selected>Coordinador</option>
                    <?php
                    $coordinadores = \App\Coordinadore::all();
                    foreach ($coordinadores as $coordinador) {
                        $persona = \App\Persona::find($coordinador->id_persona);
                        echo "<option value='$persona->email'>$persona->nombre</option>";
                    }
                    ?>
                </select><br><br>
                <!--<input type="password" name="password" class="form-control" placeholder="Password" required><br>-->
                <button class="btn btn-success btn-block" type="submit">Enviar</button>
            </form>
        </div>
    </div>
@endsection
