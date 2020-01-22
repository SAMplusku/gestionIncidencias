function añadirTec(tipo) {

    if (tipo == 'tecnico'){
        $('#tecnicoDatos').append(
            '<input type="text" name="localizacion" class="form-control" placeholder="Localización" required><br>'+
            '<input type="text" name="especializacion" class="form-control" placeholder="Especialización" required><br>'+
            '<select name="jornada" class="custom-select"><option disabled selected>Jornada</option><option value="mañana">Mañana</option><option value="tarde">Tarde</option><option value="noche">Noche</option></select><br><br>',
            '<select name="comunidad" class="custom-select"><option disabled selected>Comunidad</option><option value="alava">Alava/Araba</option><option value="Vizcaya">Vizcaya/Bizkaia</option><option value="guipuzcoa">Guipúzcoa/Gipuzkoa</option></select><br>'
        )
    }else{
        let borrar = document.getElementById("tecnicoDatos");
        while(borrar.firstChild){
            borrar.removeChild(borrar.firstChild);
        }
    }
}
