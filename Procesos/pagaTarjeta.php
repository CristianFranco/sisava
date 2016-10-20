<?php 
require("connection.php");

	$connection=connect();

 	session_start();
    $Uid = $_SESSION["IdUser"];//$_SESSION['idUsuario'];

    $idVenta = $_POST["idVenta"];

    $last4 = $_POST['tarjeta'];
    $cvc = $_POST['cvc'];
    $expiracion = $_POST['expira'];
    $bandExisteTar = false;
    $monto = $_POST['monto'];
    $idCard;

    $messageResult = "exito";
    $band = true;

    $query= "select * from tarjeta where IdUsuario = $Uid and Last4 = '$last4';";
    $result=$connection -> query($query);
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
    		$idCard = $row["IdTarjeta"];
    	    $bandExisteTar = true;
    	break;
    }
    if(!$bandExisteTar){
    	$query = "insert into tarjeta (Last4,Nombre,IdUsuario) values ($last4,'default',$Uid);";
    	if(!($connection -> query($query))){
    		$messageResult = "error al crear la tarjeta";
    		$band = false;
    	}else{
    		$query= "select * from tarjeta where IdUsuario = $Uid and Last4 = '$last4';";
    		$idCard = $row["IdTarjeta"];
    	}
    }

    $query = "insert into pago (Monto,Fecha,IdVenta) values ($monto,curdate(),$idVenta);";
    if(($connection -> query($query))){
    		$messageResult = "exito";
    		$band = true;
    	}else{
    		$messageResult = "error al pagar";
    		$band = false;
    	}


$query = "select sum(ventaproducto.Cantidad* (producto.Precio + producto.PrecioInstalacion)) as total 
				from ventaproducto, producto
				where 
				ventaproducto.IdVenta = $idVenta
				and producto.IdProducto = ventaproducto.IdProducto;";
			$result = $connection -> query($query);
			$precioDebe = 0;
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
		    	$precioDebe = $row["total"];
			}
			$query = "select sum(Monto) as total FROM pago
				where IdVenta = $idVenta;";
			$result = $connection -> query($query);
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
		    	$precioDebe -= $row["total"];
			}

			if($precioDebe <= 0 ){
					$query = "update venta set IdEstadoVenta = 4 where IdVenta=$idVenta;";
					if(($connection -> query($query))){
			    		$messageResult = "exito";
			    		$band = true;
			    	}else{
			    		$messageResult = "error al pagar";
			    		$band = false;
			    	}
			}else{}



   	$response=array("success"=>$band,"message" => $messageResult);

   	$responseArray = array();
    array_push($responseArray,$response);

   	echo json_encode($responseArray);

?>