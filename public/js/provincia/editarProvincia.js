$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data;
    $('#formEditaProvincia').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();


        $.ajax({
            url: '/provincia/editar/' + $("#idProvincia").text(),
            type: 'PUT',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log("res", response);
                if (response.status) {
                    swal({
                        title: "Provincia actualizada",
                        text: "La provincia fue actualizada exitosamente!",
                        icon: "success",
                        type: "success"
                    }).then(function () {
                        window.location.href = "/provincia";
                    }
                    );
                }
            }
        });
    });

});
