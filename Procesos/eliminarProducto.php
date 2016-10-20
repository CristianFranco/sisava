<?php
    require('connection.php');
    $connection=connect();
    $IdVenta=$_POST["IdVenta"];
    $IdProducto=$_POST["IdProducto"];
    $query="delete from ventaproducto where IdVenta=$IdVenta and IdProducto=$IdProducto;";
    $connection->query($query);
?>