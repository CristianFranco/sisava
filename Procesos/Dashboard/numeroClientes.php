<?php
    require("../connection.php");
    $connection=connect();
    $query="select count(*) as numeroClientes from usuario where IdTipoUsuario=3;";
    $row=$connection->query($query);
    $result=$row->fetch_array(MYSQLI_ASSOC);
    echo json_encode(array('numeroClientes'=>$result["numeroClientes"]));
?>