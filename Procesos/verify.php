<?php
    require("connection.php");
    $connection=connect();
    $activateCode=$_GET["activateCode"];
    $query="update usuario set Activado=1 where md5(concat(Email,Hash))='".$activateCode."';";
    $connection->query($query);
    $query="select Username from usuario where md5(concat(Email,Hash))='".$activateCode."';";
    $row=$connection->query($query);
    $result=$row->fetch_array(MYSQLI_ASSOC);
    session_start();
    $_SESSION["Usuario"]=$result['Username'];
    $_SESSION["Logged"]=true;
    header("Location: ../modificarPerfil.php");
?>