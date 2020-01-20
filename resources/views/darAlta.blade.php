@extends('master')
@section('content')

    <div class="d-flex justify-content-center align-items-center divSign">
        <div class="d-flex justify-content-center align-items-center card signup bg-light">
            <h3>Dar de alta trabajador</h3>
            <form class="form-signin w-75" action="/signup/storeUser" method="get">

                <input type="text" name="name" class="form-control" placeholder="Nombre" required autofocus><br>
                <input type="text" name="lastname" class="form-control" placeholder="Apellidos" required><br>
                <input type="text" name="phone" class="form-control" placeholder="Teléfono" required><br>
                <input type="text" name="dni" class="form-control" placeholder="DNI" required><br>
                <input type="number" name="edad" class="form-control" min="18" max="65" placeholder="Edad" required><br>
                <input type="text" name="direccion" class="form-control" placeholder="Dirección " required><br>
                <!--<label class="btn btn-default bg-info">
                    Subir foto de perfil <input type="file" hidden>
                </label>-->
                <input type="text" name="email" class="form-control" placeholder="Email" required><br>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required><br>
                <select name="tipo" onchange="añadirTec(this.value)" class="custom-select">
                    <option disabled selected>Tipo</option>
                    <option value="operario">Operario</option>
                    <option value="tecnico">Técnico</option>
                    <option value="coordinador">Coordinador</option>
                    <option value="gerente">Gerente</option>
                </select><br><br>
                <div id="tecnicoDatos"></div>
                <button class="btn btn-success btn-block" type="submit">Registrar usuario</button>
            </form>
        </div>
    </div>

@endsection
