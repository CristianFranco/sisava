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