@extends('master')

@section('content')
    <?php session_start() ?>
    <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 40px; width: 100%">
        <div class="d-flex justify-content-center align-items-center card signup bg-light">
            <h3 class="text-center">Dar de alta trabajador</h3>
                <form method="POST" action="{{ route('register') }}" onsubmit="return validacionRegistro()">
                    @csrf

                    <div class="form-group row">
                        <input type="text" id="nombre" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" required autofocus>
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                        <input type="text" id="apellido" name="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Apellidos" required>
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input type="text" id="dni" name="dni" class="form-control @error('dni') is-invalid @enderror" placeholder="DNI" required><br>
                        @error('dni')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input type="text" id="telefono" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Teléfono" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>



                    <div class="form-group row">
                        <input type="number" id="edad" name="edad" class="form-control @error('edad') is-invalid @enderror" min="18" max="65" placeholder="Edad" required>
                        @error('edad')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input type="text" id="direccion" name="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección " required>
                        @error('direccion')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row">
                            <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Repite contraseña" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group row">
                        <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" onchange="añadirTec(this.value)" class="custom-select">
                            <option value="" disabled selected>Tipo</option>
                            <option value="operador">Operario</option>
                            <option value="tecnico">Técnico</option>
                            <option value="coordinador">Coordinador</option>
                            @if($_SESSION['persona'] == 'gerente')
                            <option value="gerente">Gerente</option>
                            @endif
                        </select>
                        @error('tipo')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div id="tecnicoDatos"></div>
                    <div class="form-group row mb-0">
                        <button class="btn btn-success btn-block" type="submit">Registrar usuario</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
