 google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(mostrarDetalle);

      var chart;
      var data;

      var chart2;
      var data2;


      function mostrarDetalle(){
      $.ajax({
          url: "./Procesos/DashCategorias.php",
          type: "POST",
                  dataType: "json",
          success: function(data3){
            
              drawChart(data3);


          },
          error: function(data3){
              alert("error");
          }
        });
      }

      function drawChart(dataApi) {
  
        
          data = new google.visualization.DataTable();
          data.addColumn('string', "nombre");
          data.addColumn('number', "valor");
          var x;
        for(x in dataApi){
            data.addRow([dataApi[x].catego,parseInt(dataApi[x].Cantidad)]);            

        }

                      //data.addRow(['hola',20]);
                      //data.addRow(['hola2',10]);            


          var options = {'title':'Porcentaje de ventas en categorias',
                         'height':300,
                          is3D: true,
animation: {
                    duration: 1000,
                    startup: true,
                }
                        };

          // Instantiate and draw our chart, passing in some options.
          chart = new google.visualization.PieChart(document.getElementById('chart_div'));
          chart.draw(data, options);
          google.visualization.events.addListener(chart, 'select', selectHandler);
      }

      function drawChart2(title){
        $.ajax({
          url: "./Procesos/DashProductos.php?name="+title,
          type: "POST",
                  dataType: "json",
          success: function(dataApi){
            
              data2 = new google.visualization.DataTable();
          data2.addColumn('string', "nombre");
          data2.addColumn('number', "valor");
          var x;
        for(x in dataApi){
            data2.addRow([dataApi[x].producto,parseInt(dataApi[x].Cantidad)]);            

        }

          // Set chart options
          var options = {'title':"Porcentaje de venta de productos en "+ title,
                         'height':300,
                          is3D: true,
                animation: {
                    duration: 1000,
                    startup: true,
                }                        };

          // Instantiate and draw our chart, passing in some options.
          chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
          chart2.draw(data2, options);
          },
          error: function(dat){
              alert("error");
          }
        });
          
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