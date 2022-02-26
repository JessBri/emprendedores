$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data;
    $('#formCrearCategoria').submit(function (e) {
        e.preventDefault();
        data = $(this).serializeArray();

        console.log(data);

        $.ajax({
            url: '/categoria/validar',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log(response);
                if (response.status) {
                    swal({
                        title: "Categoría registrada",
                        text: "La categoría fue registrado exitosamente!",
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
