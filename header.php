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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style-modal.css" />
    <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    <link rel="stylesheet" type="text/css" href="css/style-meter.css" />
	<!-- Modernizr JS -->
    
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body >
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="index.php"><img src="images/Logos/stLogo_Blanco.png" width="80%"></a></div>
                    </div>
                    <div class="col-xs-8 text-right menu-1">
                        <ul>
                            <li id="index"><a href="index.php">Inicio</a></li>
                            <li id="about"><a href="about.php">Conocenos</a></li>
                            <li id="services"><a href="services.php">Productos y Servicios</a></li>
                            <li id="benefits"><a href="benefits.php">Beneficios</a></li>
                            <li id="testimonial"><a href="testimonial.php">Clientes</a></li>
                            <li id="contact"><a href="contact.php">Contactanos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-1">
                        <button id="lin" class="btn btn-primary">LogIn</button>
                    </div>
                    <div class="col-xs-1">
                        <button id="sup" class="btn btn-primary">SignUp</button>
                    </div>
                </div>
                
            </div>
        </nav>
        <div id="dialog" class="modal">
            <section>
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <a id="closeLin" href="#close" title="Close" class="close">X</a>
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1>Iniciar Sesión</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Tu correo o usuario </label>
                                    <input id="username" name="username" required="required" type="text"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Tu contraseña </label>
                                    <input id="password" name="password" required="required" type="password"/> 
                                </p>
                                <p> 
                                    <input type="submit" value="Login" class="btn btn-primary"/> 
                                </p>
                                <p class="change_link">
                                    ¿Aún no estás registrado?
                                    <a href="#toregister" class="to_register">Crea una cuenta</a>
                                </p>
                            </form>
                        </div>
                        <div id="register" class="animate form">
                            <a id="closeSup" href="#close" title="Close" class="close">X</a>
                            <form action="signup.php" method="post"  id="signupForm" autocomplete="on"> 
                                <h1> Crear una cuenta </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Usuario</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Correo</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" /> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Contraseña </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password"/>
                                    <meter max="4" id="password-strength-meter"></meter>
                                    <b id="password-strength-text"></b>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirmar Contraseña </label>
                                    <input type="password" id="passwordsignup_confirm" name="passwordsignup_confirm" required="required"/>
                                </p>
                                <p> 
									<input id="signup" type="submit" value="Sign up" class="btn btn-primary"/> 
								</p>
                                <p class="change_link">  
									¿Ya tienes una cuenta?
									<a href="#tologin" class="to_register"> Inicia Sesión </a>
								</p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
	<script src=js/header.js></script>
</html>