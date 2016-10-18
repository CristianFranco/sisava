$(document).ready(function(){
    mostrarProductos(1,false);
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
function mostrarProductos(Id,isCategory){
    if(isCategory){
        $.ajax({
            url: "./Procesos/mostrarProducto.php",
            type: "POST",
            data: {
                'Categoria':Id,
            },
            success: function(data){
                var html=JSON.parse(data);
                $('#contenedor').html(html["html"]);
            },
            error: function(data){
                alert("error");
            }
        });
    }else{
        $.ajax({
            url: "./Procesos/mostrarProducto.php",
            type: "POST",
            data: {
                'Pagina':Id,
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
}