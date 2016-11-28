<?php 
	require("../Procesos/connection.php");

	$connection=connect();	
	$idVenta = $_GET['IdVenta'];
	$query = "update venta set IdEstadoVenta = 3
		where IdVenta = $idVenta;";
    $messageResult = "Bien";
    		$band = true;
   	if(!($connection -> query($query))){
    		$messageResult = "error al crear la relacion con la  venta";
    		$band = false;
   	}

   	$response=array("success"=>$band,"message" => $message);
?>