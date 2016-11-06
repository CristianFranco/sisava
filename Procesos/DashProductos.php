

<?php
    require("connection.php");
    $connection=connect();
    $responseArray = array();
    $name = $_GET["name"];
    session_start();
    $query="select producto.Nombre as nombre,sum(ventaproducto.Cantidad) as Cantidad
			 from venta,ventaproducto,producto, categoria 
			where categoria.Nombre like('$name') and 
			producto.IdCategoria = categoria.IdCategory
			 and year(venta.Fecha)=year(curdate()) and venta.IdEstadoVenta!=1
			 and venta.IdVenta=ventaproducto.IdVenta and
			 ventaproducto.IdProducto=producto.IdProducto 
			group by producto.IdProducto order by Cantidad ;";
    $result = $connection -> query($query);
     while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $response=array("Cantidad"=>$row['Cantidad'],"producto" => $row['nombre']);
        array_push($responseArray,$response);   
    }
    echo json_encode($responseArray);
?>