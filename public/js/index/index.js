$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var oilCanvas = document.getElementById("oilChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 50;

    var oilData = {
        labels: [
            "Productos",
            "Servicios",
            "Eventos"
        ],
        datasets: [
            {
                data: [$('#contProductos').text(), $('#contServicios').text(), $('#contEventos').text()],
                backgroundColor: [
                    "#FF6384",
                    "#8463FF",
                    "#6384FF"
                ]
            }]
    };

    var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: oilData
    });



});
function consulta(idCategoria) {
    $.ajax({
        url: '/porCategoria/' + idCategoria,
        type: 'GET',
        dataType: 'JSON',
        //data: data,
        success: function (data) {
            console.log(data);
        }
    });
}