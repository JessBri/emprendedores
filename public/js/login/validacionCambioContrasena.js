$(document).ready(function(){

    $("#formCambioContrasena").validate({
        rules: {
            contrasenaEmprendedor: {
                required: true,
                minlength: 5,
            },
            confirmaContrasenaEmprendedor: {
                required: true,
                minlength: 5,
                equalTo: "#contrasenaEmprendedor",
            },
        },
        messages: {
            contrasenaEmprendedor: {
                required: "El campo contraseña es requerido",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
            },
            confirmaContrasenaEmprendedor: {
                required: "La confirmación del campo contraseña es requerido",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
                equalTo: "Las contraseñas no coinciden",
            },
        }
    });
});
