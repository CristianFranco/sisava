<?php
    session_start();
    if(!isset($_SESSION["Logged"])){
        header("Location: index.php");
    }
?>
    <!DOCTYPE html>
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/style-carrito.css">

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
                                    <h1>Carrito de Compras</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container">
                <div class="shopping-cart">
                    <div class="column-labels">
                        <label class="product-image">Imagen</label>
                        <label class="product-details">Producto</label>
                        <label class="product-price">Precio</label>
                        <label class="product-quantity">Cantidad</label>
                        <label class="product-removal">Remover</label>
                        <label class="product-line-price">Total</label>
                    </div>
                    <?php

                         require("./Procesos/connection.php");
                            $connection=connect();

                            $user= $_SESSION["IdUser"];

                            $query= "select ventaproducto.Cantidad, producto.*, imagen.* from venta, ventaproducto, producto, imagen where venta.IdUsuario = $user 
                        and venta.IdEstadoVenta = 1
                        and imagen.Index = 1
                        and ventaproducto.IdVenta = venta.IdVenta
                        and producto.IdProducto = ventaproducto.IdProducto
                        and producto.IdProducto = imagen.IdProducto;";
                            $result=$connection -> query($query);
                            $total = 0;
                            while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                  $totalParcial = $row["Precio"]*$row["Cantidad"];
                                  $total = $totalParcial + $total;
                                echo "<div class='product'>
                                    <div class='product-image'>
                                        <img src='./images/productos/$row[UrlImagen]'>
                                    </div>
                                    <div class='product-details'>
                                        <div class='product-title'>$row[Nombre]</div>
                                        <p class='product-description'>$row[Descripcion]</p>
                                    </div>
                                    <div class='product-price'>$row[Precio]</div>
                                    <div class='product-quantity'>
                                        <input type='number' value='$row[Cantidad]' min='1'>
                                    </div>
                                    <div class='product-removal'>
                                        <button class='remove-product'>
                                            Eliminar
                                        </button>
                                    </div>
                                    <div class='product-line-price'>$totalParcial</div>
                                </div>";
                            }
                    ?>
                    <div class="totals">
                        <div class="totals-item totals-item-total">
                            <label>Total</label>
                            <div class="totals-value" id="cart-total"><?php echo $total;?></div>
                        </div>
                    </div>

                    <button class="checkout">Finalizar Compra</button>

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
        <script src="js/carrito.js"></script>
    </body>

</html>