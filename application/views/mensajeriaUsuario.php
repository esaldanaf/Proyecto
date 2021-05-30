<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajeria - Panel Usuario</title>
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
        <a class="navbar-brand" href="<?php echo base_url() . "index.php/Usuario/verPanelUsuario" ?>"><img src="<?php echo base_url() . "assets/"; ?>img/Logo3.png" alt="Logo" style="width:40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barraNavegacion" aria-controls="barraNavegacion" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="barraNavegacion">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() . "index.php/Usuario/verNuevaIncidencia" ?>">Crear Incidencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Usuario/verMisIncidencias" ?>">Mis Incidencias</a>
                </li>

            </ul>
            <ul class="nav navbar-nav ml-auto" style="float: right !important;">
                <li class="nav-item">
                    <a class="nav-link active-nav-link" href="<?php echo base_url() . "index.php/Chat/verMensajeriaUsuario" ?>"">Mensajería</a>
                </li>
                <li class=" nav-item">
                        <a class="nav-link" href="<?php echo base_url() . "index.php/Usuario/verPerfilUsuario" ?>">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Usuario/logout" ?>">Cerrar Sesión</a>
                </li>
            </ul>

        </div>
    </nav>
    <!--Contenido Principal-->
    <main role="main" class="container">
        <div class="container-fluid">
            <div class="tecnicosChat">
                <h3>Elige un Técnico con el cual quieras hablar:</h3>
                <form action="<?php echo base_url() . "index.php/Chat/abrirChatUsuario"; ?>" method="POST" id="botoneraChat">
                    <?php foreach ($tecnicosChat as $botonTecnico) {
                        echo '
                        <input type="hidden" name="tNick" value="' . $botonTecnico['tNick'] . '">
                        <p><button type="submit" name="idTecnico" value="' . $botonTecnico['id'] . '" class="btn btn-primary btn-block">' . $botonTecnico['tNick'] . ' ID:' . $botonTecnico['id'] . '</button></p>
                        ';
                    } ?>
                </form>
            </div>

        </div>
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