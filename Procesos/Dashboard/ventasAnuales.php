<?php
    require("../connection.php");
    $connection=connect();
    $query="select sum(Monto) as totalAnual from pago where year(Fecha)=year(curdate());";
    $row=$connection->query($query);
    $result=$row->fetch_array(MYSQLI_ASSOC);
    echo json_encode(array('ventaAnual'=>$result["totalAnual"]));
?>