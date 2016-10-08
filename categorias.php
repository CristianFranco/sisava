<!<!DOCTYPE html>
<html lang = "es">
<head>
	
</head>
<body>
	<?php
    require("./Procesos/connection.php");
    $connection=connect();
    //$idPais="AFG";
    //echo $_POST['id'];
    $query="select * from categoria;";
    $result=$connection -> query($query);
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        echo "$row[Nombre]";

    }
?>
</body>
</html>