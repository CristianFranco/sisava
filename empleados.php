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
                        Avance de Empleados
                    </div>
                    <div id="empleados" class="chart-stage">
                        
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
    <script type="text/javascript" src="js/empleados.js"></script>
</body>

</html>