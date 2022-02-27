$(document).ready(function () {
    $("#formLogin").validate({
        rules: {
            correoEmprendedor: {
                required: true,
            },
            contrasenaEmprendedor: {
                required: true,
            },
        },
        messages: {
            correoEmprendedor: {
                required: "El campo usuario es requerido",
            },
            contrasenaEmprendedor: {
                required: "El campo contraseña es requerido"
            },
        }
    });
    $("#formRecuperacion").validate({
        rules: {
            correoRecuperacion: {
                required: true,
                email: true
            },
        },
        messages: {
            correoRecuperacion: {
                required: "El campo correo electrónico es requerido",
                email: "Ingrese un correo electrónico válido"
            }
        }
    });
});
