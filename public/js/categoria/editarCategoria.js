$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#formEditaCategoria").validate({
        rules: {
            nombreCategoria: {
                required: true,
            }
        },
        messages: {
            nombreCategoria: {
                required: "Ingrese un nombre de categoría",
            }
        }
    });

    var data;
    $('#formEditaCategoria').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();

        console.log(data, '/categoria/editar/' + $("#idCategoria").text());

        $.ajax({
            url: '/categoria/edita/' + $("#idCategoria").text(),
            type: 'PUT',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log("res", response);
                if (response.status) {
                    swal({
                        title: "Categoría actualizada",
                        text: "La categoría fue actualizada exitosamente!",
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
