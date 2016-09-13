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
	<script>
        $(document).ready(function(){
            var pathname=window.location.pathname;
            var array=pathname.split('/');
            if(array[2]=="index.php"){
                $("#index").addClass("active");
            }else if(array[2]=="about.php"){
                $("#about").addClass("active");
            }else if(array[2]=="services.php"){
                $("#services").addClass("active");
            }else if(array[2]=="benefits.php"){
                $("#benefits").addClass("active");
            }else if(array[2]=="testimonial.php"){
                $("#testimonial").addClass("active");
            }else if(array[2]=="contact.php"){
                $("#contact").addClass("active");
            }
        })    
    </script>
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
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li id="index"><a href="index.php">Inicio</a></li>
                            <li id="about"><a href="about.php">Conocenos</a></li>
                            <li id="services"><a href="services.php">Productos y Servicios</a></li>
                            <li id="benefits"><a href="benefits.php">Beneficios</a></li>
                            <li id="testimonial"><a href="testimonial.php">Clientes</a></li>
                            <li id="contact"><a href="contact.php">Contactanos</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
    </body>
</html>