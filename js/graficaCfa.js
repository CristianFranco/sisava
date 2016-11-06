 google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      var chart;
      var data;

      var chart2;
      var data2;

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
          data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
          ]);

          // Set chart options
          var options = {'title':'Porcentaje de ventas en categorias',
                         'width':400,
                         'height':300,
                          is3D: true};

          // Instantiate and draw our chart, passing in some options.
          chart = new google.visualization.PieChart(document.getElementById('chart_div'));
          chart.draw(data, options);
          google.visualization.events.addListener(chart, 'select', selectHandler);
      }

      function drawChart2(title){
          data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
          ]);

          // Set chart options
          var options = {'title':"Porcentaje de venta de productos en "+ title,
                         'width':400,
                         'height':300,
                          is3D: true};

          // Instantiate and draw our chart, passing in some options.
          chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
          chart.draw(data, options);
          google.visualization.events.addListener(chart, 'select', selectHandler);
      }

         function selectHandler() 
     {
   var selectedItem = chart.getSelection()[0];

       if (selectedItem) 
       {
        $("#chart_div2").show();
                var topping = data.getValue(selectedItem.row, 0);

        drawChart2(topping);
       }
     } 