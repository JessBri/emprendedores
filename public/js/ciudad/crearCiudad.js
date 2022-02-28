$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data;
    $('#formCrearCiudad').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();

        console.log(data);

        $.ajax({
            url: '/ciudad/crear',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log(response);
                if (response.status) {
                    swal({
                        title: "Ciudad registrada",
                        text: "La ciudad fue registrado exitosamente!",
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
