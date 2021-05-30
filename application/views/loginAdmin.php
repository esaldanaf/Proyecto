<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url() . "assets/"; ?>img/favicon.ico" type="image/x-icon">
    <!--Estilos-->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/estilos.css">

</head>

<body>
    <!--Barra navegacion -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="<?php echo base_url() . "index.php/Administrador/verIndex"; ?>"><img src="<?php echo base_url() . "assets/"; ?>img/Logo3.png" alt="Logo" style="width:40px;"></a>
        <div class="collapse navbar-collapse" id="barraNavegacion">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login Administrador</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--Contenido Principal-->
    <br><br>
    <main role="main" class="container">
        <div class="row text-center">
            <form class="col-md-4 col-center logueo" action="<?php echo base_url() . "index.php/Administrador/login"; ?>" method="POST" id="formularioLogin">
                <div class="form-group">
                    <label for="nick"> <b>Administrador:</b> </label>
                    <hr>
                    <input type="text" class="form-control" id="nickAdmin" name="nickAdmin" placeholder="Introduce Nick de Administrador" required>
                </div>
                <div class="form-group">
                    <label for="contrasena"><b>Contraseña:</b></label>
                    <hr>
                    <input type="password" class="form-control" id="contrasenaAdmin" name="contrasenaAdmin" placeholder="Introduce tu Contraseña" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            </form>
        </div>
        <br><br>

    </main>
    <!--Footer-->
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-muted">By Eduardo Saldaña - 2º DAW</span>
        </div>
    </footer>
</body>

<!--Carga de Scripts-->
<script src="<?php echo base_url() . "assets/"; ?>js/jquery-3.6.0.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/funciones.js"></script>

</html>