<?php
    session_start();
    if(!isset($_SESSION["Logged"])){
        header("Location: index.php");
    }
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SITHEC</title>

        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content="" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:description" content="" />
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
        <link rel="stylesheet" href="css/bootstrap-2.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">

        <!-- Theme style  -->
        <link rel="stylesheet" href="css/style-product.css">
        <link rel="stylesheet" href="css/style-modal.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-historial.css">
        <link rel="stylesheet" href="css/style-carrito.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
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
                                    <h1>Historial de Compras</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </header>

            <div id="fh5co-services-section">
                <div class="container">
                    <br>
                    <div class="row">
                        <div id="inProgress" class="span12">
                            <h1>Compras en Progreso</h1>
                            <?php
                                require("Procesos/connection.php");
                                $connection=connect();
                                $query="select DISTINCT date(Fecha) as fecha from venta where IdEstadoVenta=3 and IdUsuario=$_SESSION[IdUser] and Fecha is not null;";
                                $result=$connection->query($query);
                                if($result->num_rows>0){
                            ?>
                            <div id='carruselProgreso' class='carousel slide cntr' data-interval="false">
                                <div class='carousel-inner'>
                            <?php
                                $i=0;
                                while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                    if($i==0){
                                        echo "<div class='item active'>";
                                    }else{
                                        echo "<div class='item'>";
                                    }
                                    echo "<h3 class='carruselProgreso'>".$row["fecha"]."</h3></div>";
                                    $i++;
                                }
                            ?>
                                    <a style="top:10px;" href="#carruselProgreso" class='left carousel-control' onclick="actualizaTabla();" data-slide='prev'>‹</a>
                                    <a style="top:10px;" href="#carruselProgreso" class='right carousel-control' onclick="actualizaTabla();" data-slide='next'>›</a>
                                </div>
                            </div>
                            <table id="tablaProgreso" class="table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th width="15%">Producto</th>
                                        <th width="20%"></th>
                                        <th width="15%">Cantidad</th>
                                        <th width="15%">Costo</th>
                                        <th width="15%">Fecha</th>
                                        <th width="10%">Hora</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                            </table>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div id="finished" class="span12">
                            <h1>Compras Terminadas</h1>
                            <?php
                                $query="select DISTINCT date(Fecha) as fecha from venta where IdEstadoVenta=4 and IdUsuario=$_SESSION[IdUser] and Fecha is not null;";
                                $result=$connection->query($query);
                                if($result->num_rows>0){
                            ?>
                            <div id='carruselTerminadas' class='carousel slide cntr' data-interval="false">
                                <div class='carousel-inner'>
                            <?php
                                $i=0;
                                while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                    if($i==0){
                                        echo "<div class='item active'>";
                                    }else{
                                        echo "<div class='item'>";
                                    }
                                    echo "<h3 class='carrusel'>".$row["fecha"]."</h3></div>";
                                    $i++;
                                }
                            ?>
                                    <a style="top:10px;" href="#carruselTerminadas" class='left carousel-control' onclick="actualizaCompleto();" data-slide='prev'>‹</a>
                                    <a style="top:10px;" href="#carruselTerminadas" class='right carousel-control' onclick="actualizaCompleto();" data-slide='next'>›</a>
                                </div>
                            </div>
                            <table id="tablaCompleto" class="table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th width="15%">Producto</th>
                                        <th width="20%"></th>
                                        <th width="15%">Cantidad</th>
                                        <th width="15%">Costo</th>
                                        <th width="15%">Fecha</th>
                                        <th width="15%">Hora</th>
                                    </tr>
                                </thead>
                            </table>
                            <?php
                                }
                            ?>
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
        <script src="js/jquery.datetimepicker.full.min.js"></script>
        <script src="js/product.js"></script>
        <script src="js/index.js"></script>
        <script src="slick/slick.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.js"></script>
        <script type="text/javascript" src="js/historial.js"></script>
        <script type="text/javascript">
        	function rediretPagar(id){
        	 	window.location.href = "pagar.php?venta="+id;
        	 };

        </script>
    </body>

    </html>