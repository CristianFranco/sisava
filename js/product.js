$(document).ready(function(){
    mostrarProductos(1,false);
    var closeDialog=document.getElementById("closeAdd");
    var addedDialog=document.getElementById("dialog");
    closeDialog.onclick=function(){
        addedDialog.style.display="none";
    }
});
function agregarCarrito(IdProducto,event){
    if(event!=undefined){
        event.preventDefault;
        var qty=document.getElementById("cantidad");
        var cantidad=qty.value;
        var addedDialog=document.getElementById("dialog");
        $.ajax({
            url: "./Procesos/AgregaCarrito.php",
            type: "POST",
            data: {
                'producto':IdProducto,
                'cantidad':cantidad
            },
            success: function(msg){
                addedDialog.style.display="block";
            }
        });
    }else{
        var cantidad=1;
        var addedDialog=document.getElementById("dialog");
        $.ajax({
            url: "./Procesos/AgregaCarrito.php",
            type: "POST",
            data: {
                'producto':IdProducto,
                'cantidad':cantidad
            },
            success: function(msg){
                addedDialog.style.display="block";
            }
        });
    }
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
function closeAlert(event){
    event.preventDefault();
    var closeDialog=document.getElementById("closeAdd");
    var addedDialog=document.getElementById("dialog");
    addedDialog.style.display="none";
}