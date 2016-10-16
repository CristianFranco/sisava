<?php
    session_start();
    session_destroy();
    session_unset();
    $_SESSION["Usuario"]="";
    $_SESSION["Logged"]="";
    $_SESSION["IdUser"]="";
    echo($_SESSION["Usuario"]);
    header("Location: ../index.php");
?>