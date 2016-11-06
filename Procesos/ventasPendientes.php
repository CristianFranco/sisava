<?php
    require("connection.php");
    $connection=connect();
    $query="select count(*) as cuenta from venta where IdEstadoVenta=2;";
    $rows=$connection->query($query);
    $result=$rows->fetch_array(MYSQLI_ASSOC);
    echo json_encode(array('ventas'=>$result["cuenta"]));
?>