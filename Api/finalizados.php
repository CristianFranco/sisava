<?php
require("../Procesos/connection.php");

    $connection=connect();  
    $IdUser = $_GET['IdUser'];
    $query="select venta.IdVenta,venta.FechaInstalacion, producto.Nombre,ventaproducto.Cantidad, domicilio.Latitud, domicilio.Longitud from
 ventaproducto,producto,venta,domicilio
where venta.IdUsuarioEmpleado = $IdUser and (venta.IdEstadoVenta = 3 or venta.IdEstadoVenta = 4)
and ventaproducto.IdVenta = venta.IdVenta 
and domicilio.IdDomicilio = venta.IdDomicilio
and producto.IdProducto = ventaproducto.IdProducto;";
    $result=$connection -> query($query);

    $idUsuario = 0;
    $idTipoUsuario = 0;

    $producto;
    $venta;
    $fecha;
    $responseArray = array();
    $messageResult = "Exito";
    $idVenta;
    $Nombre;
    $cantidad;
    $lat;
    $lng;
    $bool = true;
    $ventas = array();
    $pendientes = array();
    array_push($responseArray,$ventas);
    
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        if($bool){
            $idVenta = $row['IdVenta'];
            $fecha = $row['FechaInstalacion'];
            $lat = $row['Latitud'];
            $lng = $row['Longitud'];
            $bool = false;
        }
        if($idVenta != $row['IdVenta']){
            $pendiente = array("IdVenta"=>$idVenta,'Fecha'=>$fecha,"items" => $ventas,"Lat" => $lat, "Lng"=>$lng);
            array_push($pendientes, $pendiente);
            $idVenta = $row['IdVenta'];
            $fecha = $row['FechaInstalacion'];
            $lat = $row['Latitud'];
            $lng = $row['Longitud'];


            $ventas = array();
        }
            $Nombre = $row['Nombre'];
            $cantidad = $row['Cantidad'];
            $venta=array("Nombre"=>$Nombre,"Cantidad" => $cantidad);
            array_push($ventas, $venta);
        
        
    }
  
    echo json_encode($pendientes);
        
?>