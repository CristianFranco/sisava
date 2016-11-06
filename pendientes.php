<!DOCTYPE html>
<html>

<head>
    <title>Sithec Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/keen-dashboards.css" />
    <link rel="stylesheet" href="css/style-carrito.css">
</head>

<body class="application">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="dashboard.php">Panel de Ventas</a></li>
                    <li><a href="empleados.php">Panel de Empleados</a></li>
                    <li><a href="pendientes.php">Ventas Pendientes</a></li>
                    <li><a href="Procesos/logout.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Ventas por Aprobar
                    </div>
                    <div id="empleados" class="chart-stage" style="padding-top:50px">
                        <div class="shopping-cart">
                            <div class="column-labels">
                                <label class="product-info">Empleado</label>
                                <label class="product-info">Fecha de Pedido</label>
                                <label class="product-info">Fecha de Instalación</label>
                                <label class="product-info">Cliente</label>
                                <label class="product-line-price">Total</label>
                                <label class="product-removal">Aprobar</label>
                            </div>
                            <?php
                                 require("./Procesos/connection.php");
                                    $connection=connect();

                                    $query= "select concat(usuario.Nombre,' ',usuario.Apellido) as nombreEmpleado, venta.Fecha as FechaPedido, venta.FechaInstalacion, concat(usuario.Nombre,' ',usuario.Apellido) as Cliente, sum(ventaproducto.Cantidad*producto.Precio+ventaproducto.Cantidad*producto.PrecioInstalacion) as Precio,venta.IdVenta from venta,usuario,ventaproducto,producto where IdEstadoVenta=2 and venta.IdUsuarioEmpleado=usuario.IdUsuario and venta.IdVenta=ventaproducto.IdVenta and ventaproducto.IdProducto=producto.IdProducto and venta.IdUsuario=usuario.IdUsuario group by venta.IdVenta;";
                                    $result=$connection -> query($query);
                                    while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                        echo "<div class='product'>
                                            <div class='product-info'>
                                                $row[nombreEmpleado]
                                            </div>
                                            <div class='product-info'>
                                                $row[FechaPedido]
                                            </div>
                                            <div class='product-info'>$row[FechaInstalacion]</div>
                                            <div class='product-info'>
                                                $row[Cliente]
                                            </div>
                                            
                                            <div class='product-line-price'>$row[Precio]</div>
                                            <div class='product-removal'>
                                                <button onclick='aprobar($row[IdVenta])' class='remove-product'>
                                                    Aprobar
                                                </button>
                                            </div>
                                        </div>";
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            

        </div>


        <hr>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="js/holder.js"></script>
    <script>
        Holder.add_theme("white", {
            background: "#fff",
            foreground: "#a7a7a7",
            size: 10
        });
    </script>

    <script type="text/javascript" src="js/keen.min.js"></script>
    <script type="text/javascript" src="js/meta.js"></script>
    <script type="text/javascript" src="js/keen.dashboard.js"></script>
    <script type="text/javascript" src="js/pendientes.js"></script>
</body>

</html>