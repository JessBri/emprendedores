$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#formEditaCiudad").validate({
        rules: {
            idProvincia: {
                required: true,
            },
            nombreCiudad: {
                required: true,
            }
        },
        messages: {
            idProvincia: {
                required: "Seleccione una provincia",
            },
            nombreCiudad: {
                required: "Ingrese un nombre de ciudad",
            }
        }
    });

    var data;
    $('#formEditaCiudad').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();

        $.ajax({
            url: '/ciudad/editar/' + $("#idCiudad").text(),
            type: 'PUT',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log("res", response);
                if (response.status) {
                    swal({
                        title: "Ciudad actualizada",
                        text: "La ciudad fue actualizada exitosamente!",
                        icon: "success",
                        type: "success"
                    }).then(function () {
                        window.location.href = "/ciudad";
                    }
                    );
                }
            }
        });
    });

});
