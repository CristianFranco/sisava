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
});
function mostrarCompra(IdProducto){
    var inputId=document.getElementById("idProducto");
    inputId.value=IdProducto;
    var modal=document.getElementById("formAdd");
    modal.style.display="block";
}