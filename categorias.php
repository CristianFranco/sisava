<!<!DOCTYPE html>
<html lang = "es">
<head>
</head>
<body>
	<?php
    require("./Procesos/connection.php");
    $connection=connect();

    $query="select * from categoria;";
    $result=$connection -> query($query);
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        echo "<a href=\"catalogo.php?categoria=$row[IdCategory]\">$row[Nombre]</a> <br />";
    }
?>
</body>
</html>