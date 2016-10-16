<!DOCTYPE html>
<html>
<head>
	<title>Sithec</title>
</head>
<body>

tus cosas
<ul>
<?php
	
 require("./Procesos/connection.php");
    $connection=connect();

    session_start();
    $Uid= $_SESSION['idUsuario'];

    $query= "select ventaproducto.Cantidad, producto.* from venta, ventaproducto, producto where venta.IdUsuario = $Uid 
and venta.IdEstadoVenta = 1
and ventaproducto.IdVenta = venta.IdVenta
and producto.IdProducto = ventaproducto.IdProducto;";
    $result=$connection -> query($query);
    $total = 0;
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
		  $totalParcial = $row[Precio]*$row[Cantidad];
		  $total = $totalParcial + $total;
        echo "<li> Producto: $row[Nombre] | Cantidad: $row[Cantidad] | precio: $row[Precio] | total:  $totalParcial</li>";
    }

?>
		</ul>

</body>
</html>