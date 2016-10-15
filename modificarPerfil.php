<?php
    session_start();
    if(isset($_SESSION["Logged"])){
        require("./Procesos/connection.php");
        $connection=connect();
        $query="select Nombre, Apellido, Edad, Sexo, Email, Username from usuario where Username='".$_SESSION["Usuario"]."';";
        $result=$connection->query($query);
        $rows=$result->fetch_array(MYSQLI_ASSOC);
        $Nombre=$rows["Nombre"];
        $Apellido=$rows["Apellido"];
        $Edad=$rows["Edad"];
        $Sexo=$rows["Sexo"];
        $Email=$rows["Email"];
        $Username=$rows["Username"];
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
							<h1>Modificar Perfil</h1>
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
					<h3>Ingresa tus Datos</h3>
					<form action="./Procesos/modificarDatos.php" method="post">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">Nombre(s)</label>
								<input name="fname" value="<?php echo $Nombre; ?>" required type="text" id="fname" class="form-control" placeholder="Nombre(s)">
							</div>
							<div class="col-md-6">
								<label for="lname">Apellido(s)</label>
								<input name="lname" value="<?php echo $Apellido; ?>" required type="text" id="lname" class="form-control" placeholder="Apellidos">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-6">
								<label for="age">Edad</label>
								<select id="age" name="age" class="form-control">
                                    <?php
                                        for($i=18;$i<80;$i++){
                                            if($Edad==""){
                                                if($i==18){
                                                    echo "<option value='".$i."' selected>".$i."</option>";
                                                }else{
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }
                                            }
                                            else{
                                                if($i==$Edad){
                                                    echo "<option value='".$i."' selected>".$i."</option>";
                                                }else{
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                </select>
							</div>
                            <div class="col-md-6">
                                <label for="gender">Sexo:</label><br>
                                <?php
                                    if($Sexo=='H'||$Sexo==''){
                                        echo "<input type='radio' id='gender' name='gender' value='H' checked>Hombre<br>";
                                        echo "<input type='radio' id='gender' name='gender' value='M'>Mujer";
                                    }else{
                                        echo "<input type='radio' id='gender' name='gender' value='H'>Hombre<br>";
                                        echo "<input type='radio' id='gender' name='gender' value='M' checked>Mujer";
                                    }
                                ?>
                            </div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
                                <label for="email">Correo</label>
								<input value="<?php echo $Email; ?>" required type="text" id="email" name="email" class="form-control" placeholder="Email">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="user">Nombre de Usuario</label>
								<input required value="<?php echo $Username; ?>" type="text" name="user" id="user" class="form-control" placeholder="Usuario">
							</div>
						</div>
                        <div class="row form-group">
							<div class="col-md-6">
								<label for="pwd">Nueva Contraseña</label>
								<input type="password" name="pwd" id="pwd" class="form-control" placeholder="Contraseña">
                                <meter max="4" id="passwordmeter"></meter>
							</div>
                            <div class="col-md-6">
								<label for="pwdconf">Confirmar Contraseña</label>
								<input type="password" name="pwdconf" id="pwdconf" class="form-control" placeholder="Confirmar Contraseña">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Guardar Cambios" class="btn btn-primary">
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
<?php
    }else{
        header("Location: index.php");
    }
?>