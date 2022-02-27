$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#enviaCorreoRecuperacion').click(function(e){
        e.preventDefault();
        if($("#formRecuperacion").valid()){
            data = $("#formRecuperacion").serializeArray();

            $.ajax({
                url: '/recuperaContrasena',
                type:'POST',
                dataType: 'JSON',
                data: data,
                success: function(data) {
                    console.log(data);

                    swal({
                        title: "Petición enviada",
                        text: "Si el usuario se encuentra registrado te llegará un correo de Recuperación de contraseña. Favor revisar.",
                        icon: "success",
                        type: "success"
                    }).then(function(){
                        window.location.href = "/login";
                    });

                }
            });
        }
    });

    $("#formLogin").submit(function(e){
        e.preventDefault();
        if($("#formLogin").valid()){
            data = $(this).serializeArray();
            console.log("Es valido");
            console.log(data);

            $.ajax({
                url: '/login',
                type:'POST',
                dataType: 'JSON',
                data: data,
                success: function(data) {
                    console.log(data);
                    if(data.error){
                        swal({
                            title: "Error al iniciar sesión",
                            text: "Por favor verifique sus credenciales",
                            icon: "error",
                            type: "error"
                        });
                    }
                    if(data.success){
                        swal({
                            title: "Logueo exitoso",
                            text: "Bienvenido al sistema!",
                            icon: "success",
                            type: "success"
                        }).then(function(){
                            window.location.href = "/";
                        });
                    }
                }
            });
        }
    });
});
