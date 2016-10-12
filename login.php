<?php
    require("./Procesos/connection.php");
    $connection=connect();
    $user=$_POST["username"];
    $password=$_POST["password"];
    $query="select * from usuario where (Username='".$user."' or Email='".$user."') and Password=md5('".$password."');";
    $rows=$connection->query($query);
    $response_array=array();
    if($rows->num_rows>0){
        session_start();
        $result=$row->fetch_array(MYSQLI_ASSOC);
        $_SESSION["Usuario"]=$user;
        $_SESSION["Nombre"]=$result[Nombre];
        echo $_SESSION["Nombre"];
        /*if($_SESSION["Nombre"]==""){
            echo json_encode(array('status'=>'noData','msg'=>'No ha completado el registro'));
            exit();
        }*/
            echo json_encode(array('status'=>'success','msg'=>'Inicio de Sesión Exitoso'));
            exit();   
        
    }else{
        echo json_encode(array('status'=>'error','msg'=>'Usuario o Contraseña Invalidos'));
        exit();
    }
?>