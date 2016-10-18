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
                                    <h1>Productos y servicios</h1>
                                    <h2>Conoce los productos y servicios que Sithec te ofrece.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div id="fh5co-services-section">
                <div class="container">
                    <div class="row">
                        <div id="lateral" class="span3">
                            <div class="well well-small">
                                <h2>Categorias</h2>
                                <ul class="nav nav-list">
                                    <?php
                                        require("./Procesos/connection.php");
                                        $connection=connect();
                                        $query="select * from categoria;";
                                        $result=$connection -> query($query);
                                        while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                            echo "<li><a onclick=mostrarProductos($row[IdCategory],true)><span class='icon-chevron-right'></span>$row[Nombre]</a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div id="contenedor" class="span9">
                                    <?php
                                        echo "<ul class='breadcrumb'>
                                            <li><a onclick='mostrarProductos(1,false)'>Productos</a> <span class='divider'>/</span></li>
                                            </ul>";
                                        echo "<div class='well well-small'>";
                                        $query="select producto.*,imagen.* from producto,imagen where imagen.Index='1' and producto.IdProducto=imagen.IdProducto;";
                                        $result=$connection -> query($query);
                                        $i=0;
                                        while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                            if($i%3==0){
                                                echo "<div class='row-fluid'><ul class='thumbnails'>";
                                            }
                                            echo "<li class='span4'>
                                                        <div class='thumbnail'>
                                                            <a onclcick='mostrarDetalle($row[IdProducto])' class='overlay'></a>
                                                            <a class='zoomTool' onclick='mostrarDetalle($row[IdProducto])' title='add to cart'><span class='icon-search'></span>DETALLES</a>
                                                            <a href='product_details.html'><img src='./images/productos/$row[UrlImagen]' alt=''></a>
                                                            <div class='caption cntr'>
                                                                <p>$row[Nombre]</p>
                                                                <p><strong>$$row[Precio]</strong></p>
                                                                <h4><a class='shopBtn' onclick=agregarCarrito($row[IdProducto]) title='add to cart'> Añadir al Carrito </a></h4>
                                                                <br class='clr'>
                                                            </div>
                                                        </div>
                                                    </li>
                                                ";
                                            $i++;
                                            if($i%3==0&&i>0){
                                                echo "</ul></div>";
                                            }
                                        }
                                        if($i%3!=0){
                                            echo "</ul></div>";
                                        }
                                        echo "</div>";
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
        <script src="js/shop.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>
        <script src="js/jquery.datetimepicker.full.min.js"></script>
        <script src="js/product.js"></script>
        <script src="js/index.js"></script>
        <script src="slick/slick.min.js"></script>
    </body>

    </html>