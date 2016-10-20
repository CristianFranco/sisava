$(document).ready(function() {
    $("#btnSubmit").click(function(e){
    	e.preventDefault();
                  var postData = $(this).serializeArray();
                  var x = $("#numTar").val();
        var tarjeta = x.substring(12, 16);

         postData.push({name: "idVenta", value: $("#idVenta").val()});
         postData.push({name:"tarjeta", value: tarjeta});
         postData.push({name:"cvc", value: $("#numCvc").val()});
         postData.push({name:"expira", value: $("#numVig").val()});
         postData.push({name:"monto", value: $("#monto").val()});

    	$.ajax({
                    url: "Procesos/pagaTarjeta.php"
                    , method: "POST"
                    , data: postData
                    , dataType: "JSON"
                    , success: function (result) {
                    	 for (var x = 0; x < result.length; x++) {
                            if(result[x].success){
                            alert("bien");
                            }else{
                            alert("mal");
                            }
                        }
                    },
                    error: function(res,res2){
                        alert(res2);
                    }
                });

    });
  });

    function cargaTarjeta(last4){
        $("#numTar").val("**** **** **** "+last4);
        $("#numCvc").val("***");
        $("#numVig").val("****");
    }


