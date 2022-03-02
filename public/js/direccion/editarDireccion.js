$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var idProvincia = "";

    setTimeout(function () {
        idProvincia = $("#idProvinciaSelect").text();
        cargaCiudades(idProvincia);
    }, 50);




    var data;
    $('#formDireccion').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();

        $.ajax({
            url: '/direccion/editar/' + $("#idDireccion").text(),
            type: 'PUT',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log("res", response);
                if (response.status) {
                    swal({
                        title: "Direccion actualizada",
                        text: "La direccion fue actualizada exitosamente!",
                        icon: "success",
                        type: "success"
                    }).then(function () {
                        window.location.href = "/direccion";
                    }
                    );
                }
            }
        });
    });

});


function cargaCiudades(idProvincia) {
    $("#ciudades").empty();
    $.ajax({
        url: '/direccion/ciudad/' + idProvincia,
        type: 'GET',
        dataType: 'JSON',
        data: '',
        success: function (response) {
            $("#ciudades").append('<option value="">Seleccione una ciudad</option>');
            $.each(response.ciudades, function (id, value) {
                if (value.idProvincia == idProvincia) {
                    $("#ciudades").append('<option value="' + value.idCiudad + '" selected>' + value.nombreCiudad + '</option>');

                } else {
                    $("#ciudades").append('<option value="' + value.idCiudad + '">' + value.nombreCiudad + '</option>');
                }
            });
        }
    });
}