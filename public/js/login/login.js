$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data;
    $('#enviaCorreoRecuperacion').click(function(e){
        e.preventDefault();
        console.log($("#correoRecuperacion").val());

    });



});
