$(document).ready(function () {
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(avanceEmpleados);
});
function avanceEmpleados() {
    $.ajax({
        url: './Procesos/Dashboard/avanceEmpleados.php',
        dataType: "json",
        success: function (data) {
            var datos = new google.visualization.DataTable(data);
            var options = {
                animation: {
                    duration: 500,
                    startup: true,
                },
                height: 350,
                colors: ['red','green'],
                vAxis: {
                    minValue: 0,
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('empleados'));
            chart.draw(datos, options);
        }
    });
}