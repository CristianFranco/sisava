$(document).ready(function(){
    $.ajax({
        url: './Procesos/ventasPendientes.php',
        method: 'POST',
        success: function(data){
            var numArticulos=JSON.parse(data);
            $("#cart").find('.badge').html(numArticulos["ventas"]);
        }
    });
    setInterval(function(){
        $.ajax({
            url: './Procesos/ventasPendientes.php',
            method: 'POST',
            success: function(data){
                var numArticulos=JSON.parse(data);
                $("#cart").find('.badge').html(numArticulos["ventas"]);
            }
        });
    },1000);
});
var fadeTime = 300;
$('.product-removal button').click( function() {
  removeItem(this);
});
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
  });
}
function aprobar(IdVenta){
    $.ajax({
        url: "./Procesos/aprobarVenta.php",
        type: "POST",
        data:{
            'IdVenta':IdVenta,
        }
    });
}