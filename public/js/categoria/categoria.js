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
            text: "Esta seguro de eliminar la categoría : " + nombreCategoria + "?",
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
                                title: "Categoría eliminado",
                                text: "La categoría " + $(this).find(".nombreCategoria").text() + "fue eliminada exitosamente!",
                                icon: "success",
                                type: "success"
                            }).then(function () {
                                window.location.href = "/categoria";
                            }
                            );
                        }
                        if (data.error) {
                            swal({
                                title: "Error al eliminar el categoría",
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
