<?php
require("../Procesos/connection.php");

	$connection=connect();	
	$IdUser = $_GET['IdUser'];
	$query="select venta.IdVenta, producto.Nombre,ventaproducto.Cantidad from
 ventaproducto,producto,venta 
where venta.IdUsuarioEmpleado = $IdUser and venta.IdEstadoVenta = 3 or  
where venta.IdUsuarioEmpleado = $IdUser and venta.IdEstadoVenta = 4    
and ventaproducto.IdVenta = venta.IdVenta 
and producto.IdProducto = ventaproducto.IdProducto;";
    $result=$connection -> query($query);

    $idUsuario = 0;
    $idTipoUsuario = 0;

    $producto;
    $venta;

	$responseArray = array();
	$messageResult = "Exito";
    $idVenta;
    $Nombre;
    $cantidad;
    $bool = true;
    $ventas = array();
    $pendientes = array();
    array_push($responseArray,$ventas);
    
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        if($bool){
            $idVenta = $row['IdVenta'];
            $bool = false;
        }
        if($idVenta != $row['IdVenta']){
            $pendiente = array("IdVenta"=>$idVenta,"items" => $ventas);
            array_push($pendientes, $pendiente);
            $idVenta = $row['IdVenta'];
            $ventas = array();
        }
            $Nombre = $row['Nombre'];
            $cantidad = $row['Cantidad'];
            $venta=array("Nombre"=>$Nombre,"Cantidad" => $cantidad);
            array_push($ventas, $venta);
        
    	
    }
  
    echo json_encode($pendientes);
    	
?>