<?php
    require("connection.php");
    $connection=connect();
    $responseArray = array();
    session_start();
    $query="select categoria.Nombre as nombre,sum(ventaproducto.Cantidad) as Cantidad
        from venta,ventaproducto,producto,categoria
        where year(venta.Fecha)=year(curdate()) and venta.IdEstadoVenta!=1 and venta.IdVenta=ventaproducto.IdVenta and ventaproducto.IdProducto=producto.IdProducto and producto.IdCategoria=categoria.IdCategory
        group by categoria.IdCategory order by Cantidad;";
    $result = $connection -> query($query);
     while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $response=array("Cantidad"=>$row['Cantidad'],"catego" => $row['nombre']);
        array_push($responseArray,$response);   
    }
    echo json_encode($responseArray);
?>