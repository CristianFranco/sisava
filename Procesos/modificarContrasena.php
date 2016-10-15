<?php
    session_start();
    require("connection.php");
    $connection=connect();
    $Email=$_POST["email"];
    $Password=$_POST["pwd"];
    $query="update usuario set Password=md5('".$Password."') where Email='".$Email."';";
    $connection->query($query);
    header("Location: ../index.php");
?>