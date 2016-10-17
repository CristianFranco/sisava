$(document).ready(function(){
    var closeAdd=document.getElementById("closeAdd");
    var addModal=document.getElementById("formAdd");
    var quantity=document.getElementById("quantity");
    var date=document.getElementById("date");
    jQuery("#date").datetimepicker();
    closeAdd.onclick=function(){
        quantity.value=1;
        date.value="";
        addModal.style.display="none";
    }
    $(".carousel").slick({
        arrows: true,
       infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        slidesToShow: 1,
                slidesToScroll: 1
    });
});
function agregarCarrito(IdProducto){
    var IdQuanity="quantity"+IdProducto;
    var inputQuantity=document.getElementById(IdQuanity);
    var cantidad=inputQuantity.value;
    $.ajax({
        url: "./Procesos/AgregaCarrito.php",
        type: "POST",
        data: {
            'producto':IdProducto,
            'cantidad':cantidad
        },
        success: function(msg){
            alert("Agregado");
        }
    });
}