function añadirTec(tipo) {

    if (tipo == 'tecnico'){
        $('#tecnicoDatos').append(
            '<select name="localizacion" class="form-control"><option disabled selected>Localización</option><option value="42.86692483027981, -2.676793844898662">Álava/Araba</option><option value="43.322196127201764, -1.975069515458618">Guipúzcoa/Guipuzkoa</option><option value="43.25920592943639, -2.938555670101835">Vizcaya/Bizkaia</option></select><br>'+
            '<select name="especializacion" class="form-control"><option disabled selected>Especialización</option><option value="pinchazo">Pinchazo</option><option value="motor">Motor</option><option value="averia">Averia</option><option value="otros">Otros</option></select><br>'+
            '<select name="jornada" class="form-control"><option disabled selected>Jornada</option><option value="mañana">Mañana</option><option value="tarde">Tarde</option><option value="noche">Noche</option></select><br>',
            '<select name="comunidad" class="form-control"><option disabled selected>Comunidad</option><option value="alava">Alava/Araba</option><option value="vizcaya">Vizcaya/Bizkaia</option><option value="guipuzcoa">Guipúzcoa/Gipuzkoa</option></select><br>'
        )
    }else{
        let borrar = document.getElementById("tecnicoDatos");
        while(borrar.firstChild){
            borrar.removeChild(borrar.firstChild);
        }
    }
}
