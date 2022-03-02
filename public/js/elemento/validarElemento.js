$(document).ready(function () {
    $("#formElemento").validate({
        rules: {
            nombreElemento: {
                required: true,
            },
            descripcionElemento: {
                required: true,
            },
            precioElemento: {
                required: true,
            },
            estadoElemento: {
                required: true,
            },
            idCategoria: {
                required: true,
            },
            tipoElemento: {
                required: true,
            }
        },
        messages: {
            nombreElemento: {
                required: "El campo nombre es requerido",
            },
            descripcionElemento: {
                required: "El campo descripción es requerido"
            },
            precioElemento: {
                required: "El campo precio es requerido"
            },
            estadoElemento: {
                required: "El campo estado es requerido",
            },
            idCategoria: {
                required: "El campo categoría es requerido",
            },
            tipoElemento: {
                required: "El campo tipo es requerido",
            }
        }
    });

    $("#precioElemento").on("keyup", function () {
        var valid = /^\d{0,4}(\.\d{0,2})?$/.test(this.value),
            val = this.value;

        if (!valid) {
            this.value = val.substring(0, val.length - 1);
        }
    });

});
