<?php
    require("connection.php");
    $connection=connect();
    session_start();
    $query="select IdVenta from venta where IdEstadoVenta=1 and IdUsuario=$_SESSION[IdUser] order by IdVenta desc limit 1;";
    $rows=$connection->query($query);
    $result=$rows->fetch_array(MYSQLI_ASSOC);
    $ultimaVenta=$result["IdVenta"];
    $query="select count(*) as cuenta from ventaproducto where IdVenta=$ultimaVenta;";
    $rows=$connection->query($query);
    $result=$rows->fetch_array(MYSQLI_ASSOC);
    echo json_encode(array('numeroArticulos'=>$result["cuenta"]));
?>