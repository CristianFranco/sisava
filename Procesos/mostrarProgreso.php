<?php
    session_start();
    require("connection.php");
    $connection=connect();
    $fecha=$_POST["Fecha"];
    $query="select imagen.UrlImagen,producto.Nombre,producto.Descripcion,ventaproducto.Cantidad,producto.Precio,date(venta.FechaInstalacion) as FechaInstal, time(venta.FechaInstalacion) as HoraInstalacion from venta,ventaproducto,producto,imagen where date(venta.Fecha)='".$fecha."' and venta.Fecha is not null and venta.IdUsuario='$_SESSION[IdUser]' and IdEstadoVenta=2 and imagen.Index='1' and venta.IdVenta=ventaproducto.IdVenta and ventaproducto.IdProducto=producto.IdProducto and producto.IdProducto=imagen.IdProducto;";
    $result=$connection->query($query);
    $json=array();
    $i=0;
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $json[]=array("imagen"=>"<img src='./images/productos/".$row["UrlImagen"]."'>","producto"=>$row["Nombre"],"descripcion"=>$row["Descripcion"],"cantidad"=>$row["Cantidad"],"costo"=>$row["Cantidad"]*$row["Precio"],"fecha"=>$row["FechaInstal"],"hora"=>$row["HoraInstalacion"]);
        $i++;
    }
    echo json_encode(array("aaData"=>$json));
?>