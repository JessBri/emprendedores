$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const monthNames = ["January", "February", "Marzo", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    var data = $('#compras').text();
    var compras = [];
    var today = new Date();
    var labels = [];
    if (data) {
        compras = eval(data)
    }

    $.each(compras, function (key, value) {
        console.log(key + ": " + value.created_at);
        var date;
        date = new Date(value.created_at);
        console.log(monthNames[date.getMonth()], date.getDay(), value.cantidadCompra);
        labels.push(value);
    });
    console.log(labels);

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

