<?php
    require("./Procesos/connection.php");
    require("./Procesos/PHPMailer/PHPMailerAutoload.php");
    $connection=connect();
    $email=$_POST["emailForget"];
    $query="select Hash from usuario where Email='".$email."';";
    $result=$connection->query($query);
    if($result->num_rows>0){
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $hash=$row["Hash"];
    }else{
        $hash="";
    }
    $activateLink=md5($email . $hash);
    $from ="noreplysithec@gmail.com";
    $subject="Pasos para recuperar tu contraseña";
    $message='
    1.-Haz clic en el siguiente enlace localhost/Sithec/changePassword.php?activateCode='. $activateLink .'
    2.-Introduce en los campos tu nueva contraseña.
    3.-Haz clic en el boton "Cambiar Contraseña"
    4.-Podras iniciar sesión nuevamente.
    ';
    $mail=new PHPMailer();
    $mail->IsSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->SMTPDebug=0;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure="tls";
    $mail->Port=587;
    $mail->Username="noreplysithec@gmail.com";
    $mail->Password='Admin$A2016';
    $mail->SetFrom('noreplysithec@gmail.com',"Sithec NoReply");
    $mail->AddAddress($email);
    $mail->Subject=$subject;
    $mail->MsgHTML($message);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
?>
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

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/stLogo_Color.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Sigue las instrucciones enviadas a tu correo para poder cambiar tu contraseña</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
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