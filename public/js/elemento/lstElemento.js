$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.borrarElemento').click(function(e){
        e.preventDefault();

        var idElemento = $(this).find(".idElemento").text();
        var nombreElemento = $(this).find(".nombreElemento").text();
        swal({
            title: "Confirmación de eliminación",
            text: "Esta seguro de eliminar el elemento : "+nombreElemento+"?",
            icon: "warning",
            buttons: [
              'Cancelar',
              'Eliminar Elemento'
            ],
            dangerMode: true,
          }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/elemento/eliminar/'+idElemento,
                    type:'DELETE',
                    dataType: 'JSON',
                    //data: data,
                    success: function(data) {
                        if(data.success){
                            swal({
                                title: "Elemento eliminado",
                                text: "El Elemento "+nombreElemento+"fue eliminado exitosamente!",
                                icon: "success",
                                type: "success"
                            }).then(function(){
                                window.location.href = "/elemento";
                            }
                            );
                        }
                        if(data.error){
                            swal({
                                title: "Error al eliminar el elemento",
                                text: data.error,
                                icon: "error",
                                type: "error"
                            }).then(function(){
                                //window.location.href = "/periodo";
                            }
                            );
                        }
                    }
                });
            }
          })
    })
});
