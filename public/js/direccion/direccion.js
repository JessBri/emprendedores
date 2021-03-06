$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.borrarDireccion').click(function (e) {
        e.preventDefault();

        var idDireccion = $(this).find(".idDireccion").text();
        var nombreDireccion = $(this).find(".nombreDireccion").text();
        swal({
            title: "Confirmación de eliminación",
            text: "Esta seguro de eliminar la direccion : " + nombreDireccion + "?",
            icon: "warning",
            buttons: [
                'Cancelar',
                'Eliminar'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/direccion/eliminar/' + idDireccion,
                    type: 'DELETE',
                    dataType: 'JSON',
                    //data: data,
                    success: function (data) {
                        if (data.success) {
                            swal({
                                title: "Direccion eliminado",
                                text: "La direccion " + $(this).find(".nombreCategoria").text() + "fue eliminada exitosamente!",
                                icon: "success",
                                type: "success"
                            }).then(function () {
                                window.location.href = "/direccion";
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
