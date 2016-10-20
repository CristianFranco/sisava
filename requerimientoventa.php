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
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/stLogo_Color.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-center">
                            <div class="display-t">
                                <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                    <h1>Agrega la dirección y verifica la disponibilidad</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <hr>

<div class="container" >
<div class="row">	
	<div class="col-md-6">

		<h2>Selecciona el lugar donde se realizara el servicio</h2>

		<div id="map" style="width: 500px; height: 500px"></div>
		<br>
		<ul>
		<?php
			require("Procesos/connection.php");
		    $connection=connect();
		    $idUser= $_SESSION["IdUser"];
		    $queryDay = "select * from domicilio where IdUsuario = $idUser";
			$result = $connection -> query($queryDay);
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
		    
		    	echo "<li style='list-style-type: none;margin-left:0px;'><button class=\"form-control\" onclick=\"cargaDireccion($row[Latitud],$row[Longitud],$row[IdDomicilio])\">$row[Nombre]</button></li>";
			}
		 ?>
		 </ul>
		 <input type="text" id="IdAddress" value="0" hidden="true">
		 <input type="text" id="calle" value="0" hidden="true">
		 <input type="text" id="numero" value="0" hidden="true">
		 <input type="text" id="lat" value="0" hidden="true">
		 <input type="text" id="lng" value="0" hidden="true">
		 <input type="text" id="idEmpleado" value="0" hidden="true">

	</div>


	<div class="col-md-6">
	<h2>Elige la fecha y hora</h2>
		<input id="date">
		<h1 id="disponible" hidden="true">Fecha Disponible</h1>
		<h1 id="Nodisponible" hidden="false">Fecha No Disponible</h1>
		<br>
		<input type="submit" id="aceptarPedido" class="form-control" name="aceptarPedido" value = "Finalizar compra">

		<h1 id="exito" hidden="true">Servicio realizado con exito</h1>
		<h1 id="error" hidden="true">Error Intente mas tarde</h1>
	</div>
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