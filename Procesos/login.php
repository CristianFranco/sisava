<?php
    require("connection.php");
    $connection=connect();
    $user=$_POST["username"];
    $password=$_POST["password"];
    $query="select * from usuario where (Username='".$user."' or Email='".$user."') and Password=md5('".$password."');";
    $rows=$connection->query($query);
    $result=$rows->fetch_array(MYSQLI_ASSOC);
    $response_array=array();
    if($rows->num_rows>0){
        if($result["Activado"]=='0'){
            echo json_encode(array('status'=>'error','msg'=>'Usuario no Activado'));
            exit();
        }else{
            session_start();
            $_SESSION["Usuario"]=$user;
            $_SESSION["Logged"]=true;
            echo json_encode(array('status'=>'success','msg'=>'Inicio de Sesión Exitoso'));
            exit();
        }
    }else{
        echo json_encode(array('status'=>'error','msg'=>'Usuario o Contraseña Invalidos'));
        exit();
    }
?>