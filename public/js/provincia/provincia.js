$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.borrarProvincia').click(function (e) {
        e.preventDefault();

        var idProvincia = $(this).find(".idProvincia").text();
        var nombreProvincia = $(this).find(".nombreProvincia").text();
        swal({
            title: "Confirmación de eliminación",
            text: "Esta seguro de eliminar la provincia : " + nombreProvincia + "?",
            icon: "warning",
            buttons: [
                'Cancelar',
                'Eliminar'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/provincia/eliminar/' + idProvincia,
                    type: 'DELETE',
                    dataType: 'JSON',
                    //data: data,
                    success: function (data) {
                        if (data.success) {
                            swal({
                                title: "Provincia eliminada",
                                text: "La provincia " + $(this).find(".nombreProvincia").text() + "fue eliminada exitosamente!",
                                icon: "success",
                                type: "success"
                            }).then(function () {
                                window.location.href = "/provincia";
                            }
                            );
                        }
                        if (data.error) {
                            swal({
                                title: "Error al eliminar la provincia",
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
