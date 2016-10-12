<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SITHEC</title>

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>

<?php
	require("/Procesos/connection.php");

	$connection=connect();

	$idProducto = $_GET['producto'];


    $query="select * from producto where IdProducto = $idProducto;";
    $result=$connection -> query($query);
    $producto = null;
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
    	$producto = $row;
    }

    $query="select * from imagen where IdProducto = $idProducto;";
    $result=$connection -> query($query);
    $imagenes = array();
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
    	//$ciudad=array("Id"=>$row['ID'],"Nombre"=>$row['Nombre']);
        array_push($imagenes,$row);
    	//$imagenes = array("Id"=>$row['ID'],"Nombre"=>$row['Nombre']);
    }

    echo "<h3>".$producto["Nombre"]."</h3>";
    echo "<h5>".$producto["Descripcion"]."</h5>";

?>


<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php 
			for ($x = 0; $x < sizeof($imagenes); $x++) {
				if($x == 0){
					echo"<li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>";
				}else{
					echo "<li data-target=\"#myCarousel\" data-slide-to=\"$x\"></li>";
				}
			} 
	  ?>
    </ol>





    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <?php 
			for ($x = 0; $x < sizeof($imagenes); $x++) {
				if($x == 0){
					echo "<div class=\"item active\">";
				}else{
					echo "<div class=\"item\">";
				}
				echo "<img src=\"./images/productos/".$imagenes[$x]["UrlImagen"]."\" width=\"460\" height=\"345\"></div>";
			} 
	  ?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<?php 
	echo "<input type=\"text\" id=\"idProduct\" value=\"".$producto["IdProducto"]."\" hidden=\"true\">";
 ?>

<?php 
	echo "Precio: $".$producto["Precio"]."<br />";
	echo "Precio de instalación: $".$producto["PrecioInstalacion"]."<br />";
	echo "Duración de la instalación: ".$producto["tiempoInstalacion"]." hrs<br />";
?>

Cantidad: <input type="number" name="cantidad" id="cantidad">

<input type="submit" id="btnSubmit" value="Agregar al carrito">

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
	<script type="text/javascript" src="./js/jsApiConsumer/altaVenta.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
</body>
</html>