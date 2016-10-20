<?php
    require('connection.php');
    $connection=connect();
    $IdVenta=$_POST["IdVenta"];
    $IdProducto=$_POST["IdProducto"];
    $Cantidad=$_POST["Cantidad"];
    $query="update ventaproducto set Cantidad=$Cantidad where IdVenta=$IdVenta and IdProducto=$IdProducto;";
    $connection->query($query);
?>