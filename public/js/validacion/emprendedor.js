$(document).ready(function () {
    $("#formEmprendedor").validate({
        rules: {
            identificacionEmprendedor: {
                required: true,
                minlength: 10,
                number: true
            },
            nombreEmprendedor: {
                required: true,
            },
            apellidoEmprendedor: {
                required: true,
            },
            correoEmprendedor: {
                required: true,
                email: true
            },
            contrasenaEmprendedor: {
                required: true,
                minlength: 5,
            },
            confContrasenaEmprendedor: {
                required: true,
                minlength: 5,
                equalTo: "#contrasenaEmprendedor",
            },
        },
        messages: {
            identificacionEmprendedor: {
                required: "Ingrese una identificación",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
                number: "Se admiten solamente números!"
            },
            nombreEmprendedor: {
                required: "Ingrese un nombre"
            },
            apellidoEmprendedor: {
                required: "Ingrese un apellido"
            },
            correoEmprendedor: {
                required: "Ingrese un e-mail ",
                email: "Ingrese un correo electrónico válido"
            },
            contrasenaEmprendedor: {
                required: "Ingrese una contraseña",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
            },
            confContrasenaEmprendedor: {
                required: "Ingrese nuevamente su contraseña",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
                equalTo: "Las contraseñas no coinciden",
            },
        }
    });
});
