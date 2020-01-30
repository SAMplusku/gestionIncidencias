function validacionsignup() {
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var dni = document.getElementById("dni");
    var telefono = document.getElementById("telefono");
    var email = document.getElementById("email");
    var edad = document.getElementById("edad");
    var direccion = document.getElementById("direccion");
    var exprTel = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;
    var exprDNI = /(0?[1-9]|[1-9][0-9])[0-9]{6}(-| )?[trwagmyfpdxbnjzsqvhlcke]/;
    var exprgmail = /^[^_.]([a-zA-Z0-9_]*[.]?[a-zA-Z0-9_]+[^_]){2}@{1}[a-z0-9]+[.]{1}(([a-z]{2,3})|([a-z]{2,3}[.]{1}[a-z]{2,3}))$/;
    if (nombre.value != "" && apellido.value != "" && dni.value != "" && telefono.value != "" && email.value != "" && edad.value != "" && direccion.value != "") {
        if (nombre.size > 3 && apellido.size > 2 && direccion.size > 4 && exprDNI.exec(dni.value) && exprTel.exec(telefono.value) && exprgmail.exec(email.value)) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}
function validacionRegistro() {
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var dni = document.getElementById("dni");
    var telefono = document.getElementById("telefono");
    var edad = document.getElementById("edad");
    var direccion = document.getElementById("direccion");
    var tipo = document.getElementById("tipo");
    var exprTel = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;
    var exprDNI = /(0?[1-9]|[1-9][0-9])[0-9]{6}(-| )?[trwagmyfpdxbnjzsqvhlcke]/;
    if (tipo.value = 'tecnico') {
        var localizacion = document.getElementById("localizacion");
        var especializacion = document.getElementById("especializacion");
        var jornada = document.getElementById("jornada");
        var comunidad = document.getElementById("comunidad");
        if (nombre.value != "" && apellido.value != "" && dni.value != "" && telefono.value != "" && edad.value != "" && direccion.value != "" && localizacion.value != "" && especializacion.value != "" && jornada.value != "" && comunidad.value != "") {
            if (nombre.size > 3 && apellido.size > 2 && direccion.size > 4 && exprDNI.exec(dni.value) && exprTel.exec(telefono.value)) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    else {
        if (nombre.value != "" && apellido.value != "" && dni.value != "" && telefono.value != "" && edad.value != "" && direccion.value != "") {
            if (nombre.size > 3 && apellido.size > 2 && direccion.size > 4 && exprDNI.exec(dni.value) && exprTel.exec(telefono.value)) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}
