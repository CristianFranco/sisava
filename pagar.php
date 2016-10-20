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
    $idVenta = $_GET["venta"];
   ?>
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/stLogo_Color.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-center">
                            <div class="display-t">
                                <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                    <h1>Finaliza tu adeudo</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <hr>

<div class="container" >
<h2 id = "exito" hidden="true">Pago con éxito</h2>
<h2 id = "error" hidden="false">Error al pagar</h2>
<?php
			echo "<input type=\"text\" name=\"idVenta\" hidden=\"true\" id=\"idVenta\"  value=\"$idVenta\">";
			require("Procesos/connection.php");
		    $connection=connect();
		    $idUser= $_SESSION["IdUser"];
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
			echo "<h2>Tienes un adeudo de : $$precioDebe </h2>";

			$query = "select * from tarjeta where IdUsuario = $idUser;";
			$result = $connection -> query($query);
			$band = true;
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				if($band){
					echo "<ul><h2>Seleciona una de tus tarjetas</h2>";
					$band=false;
				}
		    	$precioDebe = $row["Last4"];
		    	echo "<li style='list-style-type: none;'><button class=\"form-control\" onclick=\"cargaTarjeta('$row[Last4]')\">***** ***** **** $row[Last4]</button></li>";
			}
			echo "</ul>";

		 ?>

	
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
		<div class="col-md-6">
			<input type="text" class="form-control" id="monto" placeholder="cantidad">
		</div>
		<div class="col-md-6">
			<input type="submit" class="form-control" id="btnSubmit" value="Pagar">
		</div>


	</div>

</div>
 <?php
            require('footer.php');
        ?>


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
        <script src="js/jsApiConsumer/pagar.js"></script>    
    </script>

</body>
</html>