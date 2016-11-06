<!DOCTYPE html>
<html>

<head>
    <title>Sithec Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/keen-dashboards.css" />
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
                    <li><a id="cart" href="pendientes.php">Ventas Pendientes<span class="badge"></span></a></li>
                    <li><a href="Procesos/logout.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Ingresos del Año
                    </div>
                    <div id="ventas" class="chart-stage" style="height:150px;line-height:150px;">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Avance de Empleados
                    </div>
                    <div id="empleados" class="chart-stage">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Número de Clientes
                    </div>
                    <div id="clientes" class="chart-stage" style="height:150px;line-height:150px;">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Ingresos por Mes
                    </div>
                    <div class="chart-stage">
                        <div id="ventasMes"></div>
                    </div>
                    <div class="chart-notes">
                        La finalidad de esta gráfica es poder mostrar el crecimiento en cuanto a ingresos de la empresa.
                    </div>
                </div>
            </div>

        </div>


        <div class="row">

            <div class="col-sm-3">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Ventas por Categoría
                    </div>
                    <div class="chart-stage">
                        <div id="chart_div"></div>
                    </div>
                    <div class="chart-notes">
                        Muestra las ventas por cada categoría de producto.
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Ventas por Categoría
                    </div>
                    <div class="chart-stage">
                <div id="chart_div2" hidden="true">grafica</div>
                    </div>
                    <div class="chart-notes">
                        Muestra las ventas por cada categoría de producto.
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Productos más vendidos
                    </div>
                    <div class="chart-stage">
                        <div id="producto"></div>
                    </div>
                    <div class="chart-notes">
                        Muestra los productos que más se han vendido.
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="chart-wrapper">
                    <div class="chart-title">
                        Ventas por Estado
                    </div>
                    <div class="chart-stage">
                        <div id="estados"></div>
                    </div>
                    <div class="chart-notes">
                        Indica las ventas por cada estado de la república.
                    </div>
                </div>
            </div>
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
    <script type="text/javascript" src="js/dashboard.js"></script>
        <script type="text/javascript" src="js/graficaCfa.js"></script>

</body>

</html>