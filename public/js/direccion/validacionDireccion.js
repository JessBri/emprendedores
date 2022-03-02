$(document).ready(function () {

    $("#formDireccion").validate({
        rules: {
            idProvincia: {
                required: true,
            },
            idCiudad: {
                required: true,
            },
            direccionDireccion: {
                required: true,
            },
            telefonoDireccion: {
                required: true,
            },
            nombreDireccion: {
                required: true,
            }
        },
        messages: {
            idProvincia: {
                required: "Seleccione una provincia",
            },
            idCiudad: {
                required: "Seleccione una ciudad",
            },
            direccionDireccion: {
                required: "Ingrese una dirección",
            },
            telefonoDireccion: {
                required: "Ingrese un teléfono",
            },
            nombreDireccion: {
                required: "Ingrese un nombre de dirección",
            }
        }
    });

});
