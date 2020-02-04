function validacionsignup():boolean{
    let nombre = <HTMLInputElement>document.getElementById("nombre");
    let apellido = <HTMLInputElement>document.getElementById("apellido");
    let dni = <HTMLInputElement>document.getElementById("dni");
    let telefono = <HTMLInputElement>document.getElementById("telefono");
    let email = <HTMLInputElement>document.getElementById("email");
    let edad = <HTMLInputElement>document.getElementById("edad");
    let direccion = <HTMLInputElement>document.getElementById("direccion");
    let exprTel = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;
    let exprDNI = /(0?[1-9]|[1-9][0-9])[0-9]{6}(-| )?[trwagmyfpdxbnjzsqvhlcke]/;
    let exprgmail = /^[^_.]([a-zA-Z0-9_]*[.]?[a-zA-Z0-9_]+[^_]){2}@{1}[a-z0-9]+[.]{1}(([a-z]{2,3})|([a-z]{2,3}[.]{1}[a-z]{2,3}))$/;

    if (nombre.value != "" && apellido.value!="" && dni.value!="" && telefono.value !="" && email.value !="" && edad.value!="" && direccion.value!=""){
        if (nombre.size > 3 && apellido.size > 2 && direccion.size > 4 && exprDNI.exec(dni.value) && exprTel.exec(telefono.value) && exprgmail.exec(email.value)){
                return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function validacionRegistro():boolean{
    let nombre = <HTMLInputElement>document.getElementById("nombre");
    let apellido = <HTMLInputElement>document.getElementById("apellido");
    let dni = <HTMLInputElement>document.getElementById("dni");
    let telefono = <HTMLInputElement>document.getElementById("telefono");
    let edad = <HTMLInputElement>document.getElementById("edad");
    let direccion = <HTMLInputElement>document.getElementById("direccion");
    let tipo = <HTMLInputElement>document.getElementById("tipo");
    let exprTel = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;
    let exprDNI = /(0?[1-9]|[1-9][0-9])[0-9]{6}(-| )?[trwagmyfpdxbnjzsqvhlcke]/;

    if (tipo.value=='tecnico'){
        let localizacion = <HTMLInputElement>document.getElementById("localizacion");
        let especializacion = <HTMLInputElement>document.getElementById("especializacion");
        let jornada = <HTMLInputElement>document.getElementById("jornada");
        let comunidad = <HTMLInputElement>document.getElementById("comunidad");

        if (nombre.value != "" && apellido.value!="" && dni.value!="" && telefono.value !="" &&  edad.value!="" && direccion.value!="" && localizacion.value!="" && especializacion.value!="" && jornada.value !="" && comunidad.value !=""){
            if (nombre.size > 3 && apellido.size > 2 && direccion.size > 4 && exprDNI.exec(dni.value) && exprTel.exec(telefono.value)){
                return true;
            }else{
                console.log('fallo')
                return false;
            }
        }else{
            console.log('fallo')
            return false
        }
    }else{
        if (nombre.value != "" && apellido.value!="" && dni.value!="" && telefono.value !="" &&  edad.value!="" && direccion.value!=""){
            if (nombre.size > 3 && apellido.size > 2 && direccion.size > 4 && exprDNI.exec(dni.value) && exprTel.exec(telefono.value)){
                return true;
            }else{
                console.log('fallo')
                return false;
            }
        }else{
            console.log('fallo')
            return false;
        }
    }
}

