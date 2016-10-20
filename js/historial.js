var fecha,fechaCompleto;
$(document).ready(function(){
    $('#carruselTerminadas').carousel();
    $('#carruselProgreso').carousel();
    fecha=$('#inProgress').find('.carrusel').html();
    fechaCompleto=$('#finished').find('.carrusel').html();
    $('#tablaProgreso').DataTable({
        "searching":false,
        "oredring":true,
        "info":false,
        "paging":false,
        "processing":true,
        "serverSide":true,
        "language":{
            "processing":"Procesando",
            "zeroRecords":"Aún no realizas compras"
        },
        "aoColumns":[
            {"mData":"imagen","orderable":false},
            {"mData":"producto","orderable":false},
            {"mData":"descripcion","orderable":false},
            {"mData":"cantidad","orderable":false},
            {"mData":"costo","orderable":false},
            {"mData":"fecha","orderable":false},
            {"mData":"hora","orderable":false},
            {"mData":"boton","orderable":false}
        ],
        "ajax":{
            url: "./Procesos/mostrarProgreso.php",
            type: "POST",
            data:{
                'Fecha':fecha
            },
            beforeSend: function(xhr,s){
                s.url+="?Fecha="+fecha;
            }
        }
    });
    $('#tablaCompleto').DataTable({
        "searching":false,
        "oredring":true,
        "info":false,
        "paging":false,
        "processing":true,
        "serverSide":true,
        "language":{
            "processing":"Procesando",
            "zeroRecords":"Aún no realizas compras"
        },
        "aoColumns":[
            {"mData":"imagen","orderable":false},
            {"mData":"producto","orderable":false},
            {"mData":"descripcion","orderable":false},
            {"mData":"cantidad","orderable":false},
            {"mData":"costo","orderable":false},
            {"mData":"fecha","orderable":false},
            {"mData":"hora","orderable":false}
        ],
        "ajax":{
            url: "./Procesos/muestraCompleto.php",
            type: "POST",
            data:{
                'Fecha':fechaCompleto
            },
            beforeSend: function(xhr,s){
                s.url+="?Fecha="+fechaCompleto;
            },
            error: function(data){
                alert("Error");
            }
        }
    });
    actualizaCompleto();
    actualizaTabla();
});
function actualizaTabla(){
    setTimeout(function(){
        fecha=$('#inProgress').find('.active').find('.carruselProgreso').html();
        //alert(fecha);
        $('#tablaProgreso').DataTable().ajax.reload();
    },1000);
    
}
function actualizaCompleto(){
    setTimeout(function(){
       fechaCompleto=$('#finished').find('.active').find('.carrusel').html();
        //alert(fechaCompleto);
        $('#tablaCompleto').DataTable().ajax.reload(); 
    },1000);
    
}