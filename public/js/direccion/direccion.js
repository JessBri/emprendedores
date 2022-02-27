$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.borrarLugar').click(function (e) {
        e.preventDefault();

        var idCategoria = $(this).find(".idCategoria").text();
        var nombreCategoria = $(this).find(".nombreCategoria").text();
        swal({
            title: "Confirmación de eliminación",
            text: "Esta seguro de eliminar el lugar : " + nombreCategoria + "?",
            icon: "warning",
            buttons: [
                'Cancelar',
                'Eliminar'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/categoria/eliminar/' + BigInt(idCategoria),
                    type: 'DELETE',
                    dataType: 'JSON',
                    //data: data,
                    success: function (data) {
                        if (data.success) {
                            swal({
                                title: "Lugar eliminado",
                                text: "El lugar " + $(this).find(".nombreCategoria").text() + "fue eliminado exitosamente!",
                                icon: "success",
                                type: "success"
                            }).then(function () {
                                window.location.href = "/categoria";
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
