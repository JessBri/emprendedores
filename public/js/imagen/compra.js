$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data;
    $('#formCompra').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();

        swal({
            title: "¿Está seguro de realizar esta compra?",
            text: "Al hacer clic en comprar podrá ver los datos del vendedor.",
            icon: "warning",
            buttons: [
                'Cancelar',
                'Comprar'
            ],
            dangerMode: false,
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/compra',
                    type: 'POST',
                    dataType: 'JSON',
                    data: data,
                    success: function (data) {
                        if (data.status) {
                            swal({
                                title: "Compra registrada",
                                text: "La compra fue registrada exitosamente!",
                                icon: "success",
                                type: "success"
                            }).then(function () {
                                window.location.href = "/compra";
                            }
                            );
                        } else {
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




    $('#btnCalificar').click(function (e) {
        e.preventDefault();


        var data = {
            calificacionCompra: $('input[name=rating]:checked').val()
        }
        console.log($("#idCompra").text());

        var idCompra = $("#idCompra").text();

        $.ajax({
            url: '/compra/editar/' + idCompra,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (data) {
                if (data.status) {
                    swal({
                        title: "Calificación registrada",
                        text: "La calificación fue registrada exitosamente!",
                        icon: "success",
                        type: "success"
                    }).then(function () {
                        window.location.href = "/compra";
                    }
                    );
                } else {
                    swal({
                        title: "Error al eliminar la provincia",
                        text: data.error,
                        icon: "error",
                        type: "error"
                    }).then(function () {
                    }
                    );
                }
            }
        });



    });


    $('#btnComprarSession').click(function (e) {
        e.preventDefault();


        swal({
            title: "Iniciar sesión",
            text: "Por favor inicia sesión para poder continuar",
            icon: "warning",
            type: "success"
        }).then(function () {
            window.location.href = "/login";
        }
        );


    });
});