<?php
    require('connection.php');
    $connection=connect();
    $IdVenta=$_POST["IdVenta"];
    $query="update venta set IdEstadoVenta=3 where IdVenta=$IdVenta;";
    $connection->query($query);
?>