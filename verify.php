<?php
    require("./Procesos/connection.php");
    $connection=connect();
    $activateCode=$_GET["activateCode"];
    $query="update usuario set Activado=1 where md5(concat(Email,Hash))='".$activateCode."';";
    $connection->query($query);
    header("Location: index.php");
?>