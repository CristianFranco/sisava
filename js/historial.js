var fecha,fechaCompleto;
$(document).ready(function(){
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
            {"mData":"hora","orderable":false}
        ],
        "ajax":{
            url: "./Procesos/mostrarProgreso.php",
            type: "POST",
            data:{
                'Fecha':fecha
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
            }
        }
    });
    actualizaCompleto();
    actualizaTabla();
});
function actualizaTabla(){
    fecha=$('#inProgress').find('.carrusel').html();
    $('#tablaProgreso').DataTable().ajax.reload();
}
function actualizaCompleto(){
    fechaCompleto=$('#finished').find('.carrusel').html();
    $('#tablaCompleto').DataTable().ajax.reload();
}