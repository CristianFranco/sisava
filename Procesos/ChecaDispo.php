<?php 

 	require("connection.php");
    $connection=connect();

	$bandResponse = true;
	$responseArray = array();
	$messageResult = "Exito";

	$SePuedeBand = false;

	$day = 27;
	$mounth = 10;
	$year = 2016;
	$tiempoServicioRequerido = 2;
	$horaInicioRequerido = 11;

$arrayDays = array(
    "Monday" => "Lu",
    "Tuesday" => "Ma",
    "Wednesday" => "Mi",
    "Thursday" => "Ju",
    "Friday" => "Vi",
    "Saturday" => "Sa",
    "Sunday" => "Do",
);

//obtener el dia
	$dayName = "";
	$queryDay = "select dayname(date('$year-$mounth-$day')) as dayName;";
	$result = $connection -> query($queryDay);
	 while($row=$result->fetch_array(MYSQLI_ASSOC)){
    	$dayName = $row['dayName'];
    	break;
	}

	$query = "Select IdUsuario,Horario from usuario where IdTipoUsuario = 2;";
    $result=$connection -> query($query);

    $horaInicio = 0;
    $horaFin = 0;

    while($row=$result->fetch_array(MYSQLI_ASSOC)){
    	$idUsuario = $row['IdUsuario'];
    	$horario = $row['Horario'];
    	$horarioArray = explode($arrayDays[$dayName], $horario);
    	$horarioArray = explode(',', $horarioArray[1]);
    	$horarioArray = explode('(', $horarioArray[0]);
    	$horarioArray = explode(':', $horarioArray[1]);
    	$horaInicio = $horarioArray[0];


    	$horaFinArray = explode($arrayDays[$dayName], $horario);
    	$horaFinArray = explode(',', $horaFinArray[1]);
    	$horaFinArray = explode(')', $horaFinArray[1]);
    	$horaFinArray = explode(':', $horaFinArray[0]);
    	$horaFin = $horaFinArray[0];

    	$horaServicio = 0;
    	$tiempoServicio = 0;

    	//ver sus ocupaciones ese dia
    	$query2 = "select distinct venta.IdVenta as IdVenta, hour(venta.FechaInstalacion) as hora, minute(venta.FechaInstalacion) as minute  
			from venta,usuario where
			DAY(FechaInstalacion) = $day AND MONTH(FechaInstalacion) = $mounth AND YEAR(FechaInstalacion) = $year
			and IdUsuarioEmpleado = $idUsuario;";

		    $resultIdVenta = $connection -> query($query2);
		    $band = true;
		    while($rowVenta=$resultIdVenta->fetch_array(MYSQLI_ASSOC)){
		    	$band = false;
		    	$horaServicio = $rowVenta["hora"];
		    	//ver a que hora inicia ese servicio
		    	$queryHoras = "select sum(ventaproducto.Cantidad* producto.tiempoInstalacion) as tiempo -- producto.tiempoInstalacion, producto.IdProducto, ventaproducto.Cantidad, ventaproducto.Cantidad* producto.tiempoInstalacion as tiempoTotal
					from ventaproducto, producto
					where 
					ventaproducto.IdVenta = $rowVenta[IdVenta] and
					producto.IdProducto = ventaproducto.IdProducto;";
					$resultHora = $connection -> query($queryHoras);
				    while($rowHora=$resultHora->fetch_array(MYSQLI_ASSOC)){
				    	$tiempoServicio = $rowHora["tiempo"];
				    	break;
				    }
				    if($horaInicioRequerido + $tiempoServicioRequerido <= $horaServicio || 	$horaInicioRequerido >= $horaServicio + $tiempoServicio){
				    	$SePuedeBand = true;
				    	break;
				    }else{
				    	break;
				    }
		    }
		    if($band){
		    	$SePuedeBand = true;
		    }
	}
	if($SePuedeBand){
		$messageResult = "Si existe disponibilidad";
    	$bandResponse = true;
	}else{
		$messageResult = "No existe disponibilidad";
    	$bandResponse = false;
	}


   	$response=array("success"=>$bandResponse,"message" => $messageResult);
    array_push($responseArray,$response);

   	echo json_encode($responseArray);
?>