$(document).ready(function() {
    $("#btnSubmit").click(function(e){
    	e.preventDefault();
                  var postData = $(this).serializeArray();

         postData.push({name: "producto", value: $("#idProduct").val()});
         postData.push({name:"cantidad", value: $("#cantidad").val()});

    	$.ajax({
                    url: "Procesos/AgregaCarrito.php"
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

