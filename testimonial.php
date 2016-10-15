<?php
    session_start();
?>
<!DOCTYPE HTML>
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
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<div>
       <?php
            require('header.php');
        ?>
    </div>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/stLogo_Color.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Clientes</h1>
							<h2>Te mostramos lo que han dicho nuestros clientes, estos testimonios se actualizan constantemente para tu mejor experiencia</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-testimonial">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Testimonios</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 animate-box">
					<div class="testimony">
						<blockquote>
							&ldquo;En la empresa teníamos un problema muy grande, la cantidad de información que teníamos que procesar al día era inmensa. Alguien nos habló de Sithec y de como podíamos pedir un sistema desde su plataforma en linea, la verdad nunca he quedado más satisfecho.&rdquo;<br>
							<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
						</blockquote>
						<p class="author"><cite>Juan García</cite></p>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="testimony">
						<blockquote>
							&ldquo;Era demasiado urgente para mi contar con un paquete de contabilidad en mi empresa. Utilizando los servicios en linea de Sithec me fue muy sencillo conseguirlo, además ellos se encargaron de todo.&rdquo;<br>
							<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
						</blockquote>
						<p class="author"><cite>Roberto Aguilar</cite></p>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="testimony">
						<blockquote>
							&ldquo;Un servicio excelente de parte de Sithec, la instalación de la red en mi negocio ha sido todo un éxito. La verdad es que los recomiendo ampliamente&rdquo;<br>
							<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
						</blockquote>
						<p class="author"><cite>Susana Montenegro</cite></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 animate-box">
					<div class="testimony">
						<blockquote>
							&ldquo;En alguna ocasión nos instalaron una red en el negocio, no le habíamos dado mantenimiento en varios años, por lo que ya no funcionaba correctamente. Gracias a los servicios de Sithec, hoy en día la red funciona mucho mejor que cuando la instalaron por primera vez.&rdquo;<br>
							<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
						</blockquote>
						<p class="author"><cite>Enrique López</cite></p>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="testimony">
						<blockquote>
							&ldquo;Teníamos una idea, poder crear un negocio de servicio de limpieza. Gracias al apoyo de Sithec pudimos alcanzar nuestro sueño, no sólo nos apoyaron con la creación del sistema Maia, sino a desarrollar nuestra idea.&rdquo;<br>
							<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
						</blockquote>
						<p class="author"><cite>Ivonne Díaz Alba</cite></p>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="testimony">
						<blockquote>
							&ldquo;Sithec nos ayudo a desarrollar una aplicación para utilizar una tarjeta que contiene descuentos para múltiples establecimientos.&rdquo;<br>
							<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
						</blockquote>
						<p class="author"><cite>Francisco González</cite></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div>
	    <?php
            require('footer.php');
        ?>
	</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
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
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

