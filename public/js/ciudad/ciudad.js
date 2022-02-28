$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.borrarCiudad').click(function (e) {
        e.preventDefault();

        var idCiudad = $(this).find(".idCiudad").text();
        var nombreCiudad = $(this).find(".nombreCiudad").text();
        swal({
            title: "Confirmación de eliminación",
            text: "Esta seguro de eliminar la ciudad : " + nombreCiudad + "?",
            icon: "warning",
            buttons: [
                'Cancelar',
                'Eliminar'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/ciudad/eliminar/' + idCiudad,
                    type: 'DELETE',
                    dataType: 'JSON',
                    //data: data,
                    success: function (data) {
                        if (data.success) {
                            swal({
                                title: "Ciudad eliminada",
                                text: "La ciudad " + $(this).find(".nombreCiudad").text() + "fue eliminada exitosamente!",
                                icon: "success",
                                type: "success"
                            }).then(function () {
                                window.location.href = "/ciudad";
                            }
                            );
                        }
                        if (data.error) {
                            swal({
                                title: "Error al eliminar el periodo",
                                text: data.error,
                                icon: "error",
                                type: "error"
                            }).then(function () {
                                //window.location.href = "/periodo";
                            }
                            );
                        }
                    }
                });
            }
        })
    });
});
