$(document).ready(function(){
   $("#loginForm").submit(function(e){
        e.preventDefault();
        $data=$(this).serialize();
        $.ajax({
            url: './Procesos/login.php',
            data: $data,
            method: "POST",
            success: function(data){
                var dato=JSON.parse(data);
                if(dato["status"]=='success'){
                    window.location.href="dashboard.php";
                }else{
                    $("#incorrect").html(dato["msg"]);
                }
            },
        });
    }); 
});
onkeyup=onkeydown=function(e){
    var evtobj=window.event? event : e;
    if(evtobj.shiftKey&&evtobj.keyCode==13){
        window.location.href="index.php";
    }
}