function existeDni() {
    let dnicliente = document.getElementById('dniCliente').value;
    $.ajax({
        data: dnicliente,
        url: "/incidencia/datosCliente?_token=T6ErduXCoOMl8BGQqGmFqLVESk6i5uYeq7JfSbT9&dniCliente="+dnicliente,
        type: "GET",
        async: false,
        success: function (data) {
            alert(data.msg)
            $("#prueba").html(data.msg);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError);
        }
    });
}
