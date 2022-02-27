$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#provincias').on('change', function () {
        console.log(this.value);
        $("#ciudades").empty();
        $.ajax({
            url: '/direccion/ciudad/' + this.value,
            type: 'GET',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log(response);
                $("#ciudades").append('<option value="">Seleccione una ciudad</option>');
                $.each(response.ciudades, function (id, value) {
                    $("#ciudades").append('<option value="' + value.idCiudad + '">' + value.nombreCiudad + '</option>');
                });
            }
        });
    });

    var data;
    $('#formCrearDireccion').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();

        console.log(data);

        $.ajax({
            url: '/direccion/crear',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log(response);
                if (response.status) {
                    swal({
                        title: "Dirección registrada",
                        text: "La dirección fue registrado exitosamente!",
                        icon: "success",
                        type: "success"
                    }).then(function () {
                        window.location.href = "/categoria";
                    }
                    );
                }
            }
        });
    });

});
