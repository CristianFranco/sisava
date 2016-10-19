<!DOCTYPE html>
<html>
<head>
	<title>Sithec</title>

	  <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery.datetimepicker.css">
        <!-- Theme style  -->
        <!-- Modernizr JS -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body >
   <?php
    session_start();
                    require('header.php');
                       

                ?>

<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>

<div class="container" >
<div class="row">	
	<div class="col-md-6">
		<div id="map" style="width: 500px; height: 500px"></div>
		<ul>
		<?php
			require("Procesos/connection.php");
		    $connection=connect();
		    $idUser= $_SESSION["IdUser"];
		    $queryDay = "select * from domicilio where IdUsuario = $idUser";
			$result = $connection -> query($queryDay);
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
		    
		    	echo "<li><button onclick=\"cargaDireccion($row[Latitud],$row[Longitud],$row[IdDomicilio])\">$row[Nombre]</button></li>";
			}
		 ?>
		 </ul>
		 <input type="text" name="hola" id="IdAddress" value="0">
		 <input type="text" name="hola" id="calle" value="0">
		 <input type="text" name="hola" id="numero" value="0">
		 <input type="text" name="hola" id="lat" value="0">
		 <input type="text" name="hola" id="lng" value="0">
		 <input type="text" name="hola" id="idEmpleado" value="0">

	</div>


	<div class="col-md-6">
	<h2>Elige la fecha y hora</h2>
		<input id="date">
		<input type="submit" id="btnVerif" name="verifica" value = "Verficar disponibilidad">
	</div>
		<input type="submit" id="aceptarPedido" name="aceptarPedido" value = "Finalizar compra">
	</div>
	<!--
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-4">
				<input type="radio" name="type" value="male" checked="true"> <img src="images/visa.jpg" style="width:50px" />  <br>
			</div>

			<div class="col-md-4">
				<input type="radio" name="type" value="male"> <img src="images/master.jpg" style="width:50px" /><br>
			</div>		

			<div class="col-md-4">
				<input type="radio" name="type" value="male"> <img src="images/scotia.png" style="width:50px"/><br>
			</div>		
		</div>
		<div class="col-md-12">
			<input type="text" id="numTar" class="form-control" placeholder="Numero de tarjeta" maxlength="16" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
		<div class="col-md-6">
			<input type="text" id="numCvc" class="form-control" placeholder="CVC" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
		<div class="col-md-6">
			<input type="text" id="numVig" class="form-control" placeholder="Fecha de vigencia" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
		</div>
	</div>-->

</div>



      <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <!-- countTo -->
        <script src="js/jquery.countTo.js"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script type="text/javascript" src="js/jquery.datetimepicker.full.min.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>


       
        <script type="text/javascript">
        	$(document).ready(function(){
		    var date=document.getElementById("date");
		    jQuery("#date").datetimepicker();
		 
		});
        </script>

    <script src="js/mapa.js" ></script>
    <script src="js/jsApiConsumer/verificaDispo.js" ></script>
    
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6ruPRFnYFnmQ4lKVFIjE3W1OYloNRB8Q&sensor=true&signed_in=true&callback=initMap"
        async defer></script>

</body>
</html>