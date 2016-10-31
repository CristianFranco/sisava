onkeyup=onkeydown=function(e){
    var evtobj=window.event? event : e;
    if(evtobj.shiftKey&&evtobj.keyCode==13){
        window.location.href="index.php";
    }
}