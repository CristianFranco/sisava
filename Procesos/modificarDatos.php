
<?php
    session_start();
    require("connection.php");
    $connection=connect();
    $Nombre=$_POST["fname"];
    $Apellido=$_POST["lname"];
    $Edad=$_POST["age"];
    $Sexo=$_POST["gender"];
    $Email=$_POST["email"];
    $Username=$_POST["user"];
    $Password=$_POST["pwd"];
    $query="update usuario set Nombre='".$Nombre."', Apellido='".$Apellido."', Edad='".$Edad."',Sexo='".$Sexo."',Email='".$Email."',Username='".$Username."'";
    if($Password!=""){
        $query=$query.", Password=md5('".$Password."')";
    }
    $query=$query." where Username='".$_SESSION["Usuario"]."';";
    $connection->query($query);
    header("Location: ../modificarPerfil.php");
?>