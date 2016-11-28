<?php 

	$band = true;
	$message = "Servicio con exito";

	require("connection.php");
    require("crypto.php")
	$connection=connect();
 	session_start();
    $Uid = $_SESSION["IdUser"];

	$idAddress = $_POST['idAddress'];
	$calle = $_POST['calle'];
	$numero = $_POST['numero'];
	$latitud = $_POST['lat'];
	$longitud = $_POST['lng'];
	$idEmpleado = $_POST['IdEmpleado'];
	$fechaInsta = $_POST['fecha'];

	if($idAddress == 0){
		$query = "insert into domicilio (Latitud, Longitud, Calle,Numero,IdUsuario) values ($latitud,$longitud,'$calle','$numero',$Uid);";
		if(($connection -> query($query))){
	    		$query = "select IdDomicilio from domicilio where IdUsuario = $Uid order By IdDomicilio desc limit 1;";
	    		$result=$connection -> query($query);
			    while($row=$result->fetch_array(MYSQLI_ASSOC)){
			    	$idAddress = $row['IdDomicilio'];
			    	break;
			    }
	   	}
	}

	$query = "update venta set FechaInstalacion = '$fechaInsta', IdDomicilio = $idAddress, IdUsuarioEmpleado = $idEmpleado, IdEstadoVenta = 2
		where IdUsuario = $Uid and IdEstadoVenta = 1;";

	if(!($connection -> query($query))){
		$band = false;
			$message = "Error de conexión";
	}
	$responseArray = array();
	$response=array("success"=>$band,"message" => $message);
    array_push($responseArray,$response);
   	echo json_encode($responseArray);

?>