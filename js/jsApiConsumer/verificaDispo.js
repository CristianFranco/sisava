$(document).ready(function() {
    $("#date").change(function(e){
    	e.preventDefault();
        var postData = $(this).serializeArray();
        var cal = $("#date");
        var calStr = $("#date").val();

        var day = calStr.split("/")[2].split(" ")[0];
        var month = calStr.split("/")[1];
        var year = calStr.split("/")[0];
        var hour = calStr.split("/")[2].split(" ")[1].split(":")[0];
        var requerido = 1;
        postData.push({name: "day", value: day});
        postData.push({name:"month", value: month});
        postData.push({name:"year", value: year});
        postData.push({name:"hora", value: hour});
        postData.push({name:"requerido", value: requerido});

    	$.ajax({
                    url: "Procesos/ChecaDispo.php"
                    , method: "POST"
                    , data: postData
                    , dataType: "JSON"
                    , success: function (result) {
                    	 for (var x = 0; x < result.length; x++) {
                            if(result[x].success){
                            	$("#idEmpleado").val(result[x].idEmpleado);
                            	$("#disponible").slideDown();
                            	$("#Nodisponible").slideUp();
                            	
                            }else{
                            	$("#Nodisponible").slideDown();
                            	$("#disponible").slideUp();
                            }
                        }
                    },
                    error: function(res,res2){
                        alert(res2);
                    }
                });

    });


    aceptarPedido

    $("#aceptarPedido").click(function(e){
    	e.preventDefault();
        var postData = $(this).serializeArray();
        var cal = $("#date");
        var calStr = $("#date").val();
        postData.push({name: "idAddress", value: $("#IdAddress").val()});
        postData.push({name:"calle", value: $("#calle").val()});
        postData.push({name:"numero", value: $("#numero").val()});
        postData.push({name:"lat", value: $("#lat").val()});
        postData.push({name:"lng", value: $("#lng").val()});
        postData.push({name:"IdEmpleado", value: $("#idEmpleado").val()});
        postData.push({name:"fecha", value: $("#date").val()});
    	$.ajax({
                    url: "Procesos/FinalizaCompra.php"
                    , method: "POST"
                    , data: postData
                    , dataType: "JSON"
                    , success: function (result) {
                    	 for (var x = 0; x < result.length; x++) {
                            if(result[x].success){
                            	$("#exito").slideDown();
                            	$("#aceptarPedido").hide();
                            	setTimeout(function(){
							        window.location.href = "index.php";

							    }, 2000);

                            }else{
                            	$("error").slideDown();
                            }
                        }
                    },
                    error: function(res,res2){
                        alert(res2);
                    }
                });

    });

  });



