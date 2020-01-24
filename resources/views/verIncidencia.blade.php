@extends("master")

@section("content")
    <div class="container-fluid p-2">
        <div class="row">
            <h1 class="h2 mb-3 font-weight-normal" >Incidencia</h1>
            <label>No disponible</label>
        </div>

        <div class="float-right w-50">
            <h2 class="h3 mb-3 font-weight-normal" style="text-align: center">Mapa de la incidencia</h2>
            <div id="map"></div>
            <script>
                let map = L.map('map').setView([42.866924, -2.676800], 8);

                L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
                    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

                }).addTo(map);

                let marker = L.marker([42.866924, -2.676800]).addTo(map);
            </script>
            <br>
            <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-success m-1" type="submit">Guardar</button>
                <button class="btn btn-lg btn-success m-1" type="submit">Guardar</button>
            </div>


        </div>
        <form class="form col-sm-6" action="" method="post">
            <h2 class="h3 mb-3 font-weight-normal" >Informacion del cliente </h2>
            <div class="form-group">
                <div class="col-xs-6">
                    <h5>Nombre</h5>
                    <input type="text" class="form-control" name="nombre"  value="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6">
                    <h5>Apellidos</h5>
                    <input type="text" class="form-control" name="apellidos"  value="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6">
                    <h5>Telefono</h5>
                    <input type="text" class="form-control" name="telefono"  value="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6">
                    <label for="email"><h5>Email</h5></label>
                    <input type="email" class="form-control" name="email"  value="" >
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6">
                    <h5>Direccion</h5>
                    <input type="text" class="form-control" name="direccion"  value="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6">
                    <h5>Dni</h5>
                    <input type="text" class="form-control" name="dni"  value="">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-6">
                    <h4>Fecha de nacimiento</h4>
                    <input type="text" class="form-control" name="fecha"   value="">
                </div>
            </div>


        </form>
    </div>

@endsection
