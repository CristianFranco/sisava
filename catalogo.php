<!DOCTYPE html>
<html>
<head>
	<title>Sithec</title>
</head>
<body>

<?php
	require("/Procesos/connection.php");

	$connection=connect();

	$idCategoria = $_GET['categoria'];


    $query="select * from producto where IdCategoria = $idCategoria;";
    $result=$connection -> query($query);
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        echo "<a href=\"producto.php?producto=$row[IdProducto]\">$row[Nombre]</a><br />";
    }

    ?>

</body>
</html>