<?php
    require("./Procesos/connection.php");
    $connection=connect();
    $activateCode=$_GET["activateCode"];
    $query="select * from usuario where md5(concat(Email,Hash))='".$activateCode."';";
    $row=$connection->query($query);
    if($row->num_rows<1){
        header("Location: index.php");
    }
    $result=$row->fetch_array(MYSQLI_ASSOC);
    $email=$result['Email'];
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
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Theme style  -->
	

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
				<div class="col-md-10 col-md-offset-1 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Cambiar Contraseña</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="fh5co-section">
		<div class="container">
			<div class="row">
                <div class="col-md-3"></div>
				<div class="col-md-6 animate-box">
					<h3>Ingresa tu nueva contraseña</h3>
					<form action="./Procesos/modificarContrasena.php" method="post">
                        <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="pwd">Nueva Contraseña</label>
								<input required type="password" name="pwd" id="pwd" class="form-control" placeholder="Contraseña">
                                <meter max="4" id="passwordmeter"></meter>
							</div>
						</div>
                        <div class="row form-group">
                            <div class="col-md-12">
								<label for="pwdconf">Confirmar Contraseña</label>
								<input required type="password" name="pwdconf" id="pwdconf" class="form-control" placeholder="Confirmar Contraseña">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Cambiar Contraseña" class="btn btn-primary">
						</div>

					</form>		
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
    <script src="js/modificarPerfil.js"></script>
	</body>
</html>