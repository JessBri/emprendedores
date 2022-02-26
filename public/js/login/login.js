$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data;
    $('#formLogin').submit(function(e){
        e.preventDefault();
        data = $(this).serializeArray();
        console.log(data);

        $.ajax({
            url: '/login/validar',
            type:'POST',
            dataType: 'JSON',
            data: data,
            success: function(data) {
                console.log(data);
            }
        });

    });

});
