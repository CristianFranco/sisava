$(document).ready(function () {
    google.charts.load('current', {
        packages: ['corechart']
    });
    ventasAnuales();
    numeroClientes();
    google.charts.setOnLoadCallback(ventasMes);
    google.charts.setOnLoadCallback(topProductos);
    google.charts.setOnLoadCallback(topEstados);
});

function ventasAnuales() {
    $.ajax({
        url: './Procesos/Dashboard/ventasAnuales.php',
        success: function (data) {
            var ventaAnual = JSON.parse(data);
            $('#ventas').html('<h1 style="text-align: center;line-height:75px;">$' + ventaAnual["ventaAnual"] + '.00</h1>')
        }
    });
}

function numeroClientes() {
    $.ajax({
        url: './Procesos/Dashboard/numeroClientes.php',
        success: function (data) {
            var numeroClientes = JSON.parse(data);
            $('#clientes').html('<h1  style="text-align: center;line-height:75px;">' + numeroClientes["numeroClientes"] + '</h1>')
        }
    });
}

function ventasMes() {
    $.ajax({
        url: './Procesos/Dashboard/ventasMes.php',
        dataType: "json",
        success: function (data) {
            var datos = new google.visualization.DataTable(data);
            var options = {
                animation: {
                    duration: 500,
                    startup: true,
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('ventasMes'));
            chart.draw(datos, options);
        }
    });
}

function topProductos() {
    $.ajax({
        url: './Procesos/Dashboard/topProducto.php',
        dataType: "json",
        success: function (data) {
            var datos = new google.visualization.DataTable(data);
            var options = {
                animation: {
                    duration: 500,
                    startup: true,
                }
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('producto'));
            chart.draw(datos, options);
        }
    });
}

function topEstados() {
    var data = google.visualization.arrayToDataTable([
          ['States', 'Estado', 'Ventas'],
          ['MX-MEX', 'Estado de Mexico', 0],
          ['MX-DIF', 'Distrito Federal', 0],
          ['MX-VER', 'Veracruz', 0],
          ['MX-JAL', 'Jalisco', 10],
          ['MX-PUE', 'Puebla', 0],
          ['MX-GUA', 'Guanajuato', 0],
          ['MX-CHP', 'Chiapas', 0],
          ['MX-NLE', 'Nuevo Leon', 0],
          ['MX-MIC', 'Michoacan de Ocampo', 0],
          ['MX-OAX', 'Oaxaca', 0],
          ['MX-CHH', 'Chihuahua', 0],
          ['MX-GRO', 'Guerrero', 0],
          ['MX-TAM', 'Tamaulipas', 0],
          ['MX-BCN', 'Baja California', 0],
          ['MX-SIN', 'Sinaloa', 0],
          ['MX-COA', 'Cohahulia de Zaragoza', 0],
          ['MX-SON', 'Sonora', 0],
          ['MX-HID', 'Hidalgo', 0],
          ['MX-SLP', 'San Luis Potosi', 2],
          ['MX-TAB', 'Tabasco', 0],
          ['MX-YUC', 'Yucatan', 0],
          ['MX-QUE', 'Queretaro de Arteaga', 0],
          ['MX-MOR', 'Morelos', 0],
          ['MX-DUR', 'Durango', 0],
          ['MX-ZAC', 'Zacatecas', 5],
          ['MX-ROO', 'Quintana Roo', 0],
          ['MX-AGU', 'Aguascalientes', 40],
          ['MX-TLA', 'Tlaxcala', 0],
          ['MX-NAY', 'Nayarit', 0],
          ['MX-CAM', 'Campeche', 0],
          ['MX-BCS', 'Baja California Sur', 0],
          ['MX-COL', 'Colima', 0]
        ]);

    var options = {
        legend: 'none', // se quita el slider indicador de poblacion minima y maxima
        //tooltip: {trigger:'none'}, 
        region: 'MX', // region a dibujar en el mapa
        resolution: 'provinces', //
        //displayMode: 'markers',
        colorAxis: {
            colors: ['rgb(228, 236, 255)', '#37527a']
        },
        animation: {
            duration: 500,
            startup: true,
        },
        height: 500,
    };
    //se instacia y se dibuja el grafico
    var chart = new google.visualization.GeoChart(document.getElementById('estados'));
    chart.draw(data, options);
}