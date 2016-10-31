
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
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <link rel="stylesheet" type="text/css" href="css/style-modal.css" />

    </head>

    <body>
        <div id="wrapper">
            <div id="login" class="animate form">
                <form id="loginForm" method="post" action="./Procesos/login.php" autocomplete="on">
                    <h1>Inicia Sesión como Administrador</h1>
                    <p>
                        <label for="username" class="uname" data-icon="u"> Usuario Administrador </label>
                        <input id="username" name="username" required="required" type="text" />
                    </p>
                    <p>
                        <label for="password" class="youpasswd" data-icon="p"> Tu contraseña </label>
                        <input id="password" name="password" required="required" type="password" />
                    </p>
                    <p><b id="incorrect"></b></p>
                    <p>
                        <input type="submit" value="Login" class="btn btn-primary" />
                    </p>
                </form>
            </div>
        </div>
    </body>
    <script src="js/admin.js"></script>
</html>