<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo $this->session->userdata('nick'); ?> - Panel Técnico</title>
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
        <a class="navbar-brand" href="<?php echo base_url() . "index.php/Tecnico/verPanelTecnico" ?>"><img src="<?php echo base_url() . "assets/"; ?>img/Logo3.png" alt="Logo" style="width:40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barraNavegacion" aria-controls="barraNavegacion" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="barraNavegacion">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Tecnico/verAsignaIncidencia" ?>">Nuevas Incidencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Tecnico/verAgendaIncidencia" ?>">Mis Incidencias</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto" style="float: right !important;">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Chat/verMensajeriaTecnico" ?>">Mensajería</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active-nav-link" href="<?php echo base_url() . "index.php/Tecnico/verPerfilTecnico" ?>">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Tecnico/logout" ?>">Cerrar Sesión</a>
                </li>
            </ul>

        </div>
    </nav>
    <!--Contenido Principal-->
    <main class="container-fluid">
        <div class="row">
            <form class="col-md-8 col-center infoPerfil" action="<?php echo base_url() . "index.php/Tecnico/modificaPerfil"; ?>" method="POST" id="formularioLogin">
                <legend>Perfil de <?php echo $this->session->userdata('nick'); ?></legend>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="uContrasena">Contraseña</label>
                        <input type="password" class="form-control" id="tContrasena" name="tContrasena" placeholder="Contraseña Técnico" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uNombre">Nombre</label>
                        <input type="text" class="form-control" id="tNombre" name="tNombre" placeholder="Nombre Técnico" value='<?php echo $this->session->userdata('nombre'); ?>' required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="uApellidos">Apellidos</label>
                        <input type="text" class="form-control" id="tApellidos" name="tApellidos" placeholder="Apellidos Técnico" value='<?php echo $this->session->userdata('apellidos'); ?>' required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uMail">Email</label>
                        <input type="email" class="form-control" id="tMail" name="tMail" placeholder="Email Técnico" value='<?php echo $this->encrypt->decode($this->session->userdata('email')); ?>' required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uTelefono">Teléfono</label>
                        <input type="tel" class="form-control" id="tTelefono" name="tTelefono" placeholder="Teléfono Técnico" value='<?php echo $this->encrypt->decode($this->session->userdata('telefono')); ?>' required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="hidden" class="form-control" id="tID" name="tID" value='<?php echo $this->session->userdata('id'); ?>' required>
                    </div>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>

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