<?php 
require("connection.php");

	$connection=connect();

 	session_start();
    $Uid= 1;//$_SESSION['idUsuario'];

	$idProducto = $_POST['producto'];
  $unidadesPagina = $_POST['cantidad'];

    $query= "select * from venta where IdUsuario = $Uid and IdEstadoVenta = 1;";
    $result=$connection -> query($query);
    $idVenta = 0;

	$band = true;
	$responseArray = array();
	$messageResult = "Exito";


    while($row=$result->fetch_array(MYSQLI_ASSOC)){
    	$idVenta = $row['IdVenta'];
    	break;
    }
    if($idVenta == 0){
    	$query = "insert into venta(IdUsuario,IdEstadoVenta) values($Uid,1);";
    	if(!($connection -> query($query))){
    		$messageResult = "error al crear la venta";
    		$band = false;
    	}
    	$query="select * from venta where IdUsuario = $Uid and IdEstadoVenta = 1;";
	    $result=$connection -> query($query);
	    while($row=$result->fetch_array(MYSQLI_ASSOC)){
	    	$idVenta = $row['IdVenta'];
	    	break;
	    }
    }

    /* verificar existencia de producto  */

    $query = "select * from ventaproducto where IdVenta = $idVenta and IdProducto = $idProducto;";
    $result=$connection -> query($query);
    $unidades = 0;
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $unidades = $row['Cantidad'];
        break;
    }
    if($unidades == 0){
          $unidades = $unidadesPagina;
          $query = "insert into ventaproducto(IdVenta, IdProducto, Cantidad) values($idVenta, $idProducto,$unidades);";

    }else{
          $unidades += $unidadesPagina;
          $query = "update ventaproducto set Cantidad = $unidades where IdProducto = $idProducto and IdVenta = $idVenta;";

    }

   	if(!($connection -> query($query))){
    		$messageResult = "error al crear la relacion con la  venta";
    		$band = false;
   	}

   	$response=array("success"=>$band,"message" => $messageResult);
    array_push($responseArray,$response);

   	echo json_encode($responseArray);

	

?>