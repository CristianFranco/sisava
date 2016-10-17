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
    $user= $_SESSION["IdUser"];

    $query= "select ventaproducto.Cantidad, producto.* from venta, ventaproducto, producto where venta.IdUsuario = $user 
and venta.IdEstadoVenta = 1
and ventaproducto.IdVenta = venta.IdVenta
and producto.IdProducto = ventaproducto.IdProducto;";
    $result=$connection -> query($query);
    $total = 0;
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
		  $totalParcial = $row["Precio"]*$row["Cantidad"];
		  $total = $totalParcial + $total;
        echo "<li> Producto: $row[Nombre] | Cantidad: $row[Cantidad] | precio unitario: $row[Precio] | total:  $totalParcial | <button>borrar</button></li>";
    }
    echo "</ul>";

	echo "<h2>Total: $total</h2>";
?>
		
	<input type="submit" name="Aceptar" id="submit" value="Siguiente">

</body>
</html>