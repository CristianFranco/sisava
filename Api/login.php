<?php
require("../Procesos/connection.php");

	$connection=connect();	
	$user = $_GET['name'];
	$password = $_GET['password'];
	$query="select * from usuario where (Username='".$user."' or Email='".$user."') and Password=md5('".$password."');";
    $result=$connection -> query($query);

    $idUsuario = 0;
    $idTipoUsuario = 0;

	$responseArray = array();
	$messageResult = "Exito";
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
    	$idUsuario = $row['IdUsuario'];
    	$idTipoUsuario = $row['IdTipoUsuario'];
    	break;
    }
    $response;
    if($idTipoUsuario == 1 || $idTipoUsuario == 0){
    	$response=array("success"=>false,"idUsuario" => 0, "Tipo" => 0);
    }else{
    	$response=array("success"=>true,"idUsuario" => $idUsuario, "Tipo" => $idTipoUsuario);
    }

    echo json_encode($response);
    	
?>