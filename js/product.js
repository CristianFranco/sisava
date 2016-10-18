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
    var cantidad=1;
    $.ajax({
        url: "./Procesos/AgregaCarrito.php",
        type: "POST",
        data: {
            'producto':IdProducto,
            'cantidad':cantidad
        },
        success: function(msg){
        }
    });
}
function agregarCarrito(IdProducto,event){
    event.preventDefault();
    var IdQuanity="quantity"+IdProducto;
    var qty=document.getElementById("cantidad");
    var cantidad=qty.value;
    $.ajax({
        url: "./Procesos/AgregaCarrito.php",
        type: "POST",
        data: {
            'producto':IdProducto,
            'cantidad':cantidad
        },
        success: function(msg){
        }
    });
}
function mostrarDetalle(IdProducto){
    $.ajax({
        url: "./Procesos/mostrarDetalle.php",
        type: "POST",
        data: {
            'IdProducto':IdProducto,
        },
        success: function(data){
            var html=JSON.parse(data);
            $('#contenedor').html(html["html"]);
        },
        error: function(data){
            alert("error");
        }
    });
}