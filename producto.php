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

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">

        <!-- Theme style  -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/jquery.datetimepicker.css">
        <link rel="stylesheet" href="css/style-pagination.css">

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
                <div class="container col-md-2 col-sm-2">
                    <div class="category">
                        <h2>Categorias</h2>
                        <ul>
                            <?php
                                require("./Procesos/connection.php");
                                $connection=connect();
                                $query="select * from categoria;";
                                $result=$connection -> query($query);
                                while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                    $query="select count(*) as cuenta from producto where IdCategoria='".$row["IdCategory"]."';";
                                    $fila=$connection->query($query);
                                    $resultado=$fila->fetch_array(MYSQLI_ASSOC);
                                    echo "<li><a href=\"catalogo.php?categoria=$row[IdCategory]\">$row[Nombre]($resultado[cuenta])</a></li>";
                                }
                                $query="select count(*) as cuenta from producto;";
                                $fila=$connection->query($query);
                                $resultado=$fila->fetch_array(MYSQLI_ASSOC);
                                echo "<li><a href=\"catalogo.php?categoria=Todos\">Todos($resultado[cuenta])</a></li>";
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10">
                    <!--Poner un while para cada producto, abajo está un ejemplo de un producto-->
                    <div class="col-md-4 col-sm-6">
                        <div class="product">
                            <div class="front feature-center">
                                <span class="icon" style="background-color:#ffffff">
                                    <div class="fh5co-staff">
                                        <!--Aquí va la imagen del producto-->
                                        <img src="images/app.jpg" alt="Free HTML5 Templates by FreeHTML5.co">
                                    </div>
                                </span>
                                <h3>Aquí va el nombre del producto</h3>
                                <p>Aquí va la descripción del producto</p>
                            </div>
                            <div class="back feature-center">
                                <span class="icon" style="background-color:#ffffff">
                                    <div class="fh5co-staff">
                                        <img src="images/app.jpg" alt="Free HTML5 Templates by FreeHTML5.co">
                                    </div>
                                </span>
                                <b>Precio:</b>Precio Producto
                                <br>
                                <b>Precio de Instalación:</b>Precio Instalación
                                <br>
                                <b>Tiempo de Instalación:</b>Tiempo Instalación hrs
                            </div>
                        </div>
                        <div>
                            <a class="button" onclick="mostrarCompra(2)">Añadir al Carrito</a>
                        </div>
                    </div>
                </div>
                <div class="pgn">
                        <ul class="pgn__list" role="navigation" aria-labelledby="paginglabel">
                          <li class="prev" title="Previous Page">
                            <a href="#" rel="prev"><i class="pgn__prev-icon icon-angle-left"></i><span class="pgn__prev-txt">Previous</span></a>
                          </li>
                          <!--<li class="prev" title="Previous Page"></li>-->
                          <li class="pgn__item">
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <strong class="current">5</strong>
                            <a href="#">6</a>
                            <a href="#">7</a>
                          </li>
                          <li class="next" title="Next Page">
                            <a href="#" rel="next"><i class="pgn__next-icon icon-angle-right"></i><span class="pgn__next-txt">Next</span></a>
                          </li>
                        </ul>
                    </div>
            </div>
            <br style="clear: both;">
            <div>
                <?php
                    require('footer.php');
                ?>
            </div>
        </div>
        <div id="formAdd" class="modal">
            <section>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <a id="closeAdd" href="#close" title="Close" class="close">X</a>
                        <form id="loginForm" method="post" action="./Procesos/login.php" autocomplete="on">
                            <h1>Añadir a Carrito</h1>
                            <p>
                                <label for="quantity" class="uname"> Cantidad de Producto </label>
                                <input id="quantity" name="quantity" required="required" type="number" min="1" value="1" />
                            </p>
                            <p>
                                <label for="date" class="youpasswd">Elije cuando y a que hora realizamos el servicio</label>
                                <input id="date" name="date" required="required" />
                            </p>
                            <input type="hidden" id="idProducto">
                            <p>
                                <input type="submit" value="Añadir" class="btn btn-primary" />
                            </p>
                            <p class="change_link">
                            </p>
                        </form>
                    </div>
                </div>
            </section>
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
    </body>
</html>