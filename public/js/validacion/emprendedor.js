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
                required: "El campo identificación es requerido",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
                number: "Se admiten solamente números!"
            },
            nombreEmprendedor: {
                required: "El campo nombre es requerido"
            },
            apellidoEmprendedor: {
                required: "El campo apellido es requerido"
            },
            correoEmprendedor: {
                required: "El campo e-mail es requerido",
                email: "Ingrese un correo electrónico válido"
            },
            contrasenaEmprendedor: {
                required: "El campo contraseña es requerido",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
            },
            confContrasenaEmprendedor: {
                required: "La confirmación del campo contraseña es requerido",
                minlength: jQuery.validator.format("Al menos {0} caracteres minimos!"),
                equalTo: "Las contraseñas no coinciden",
            },
        }
    });
});
