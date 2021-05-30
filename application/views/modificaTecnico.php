<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Técnico - Panel Administrador</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url() . "assets/"; ?>img/favicon.ico" type="image/x-icon">
    <!--Estilos-->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/estilos.css">

</head>


<body>

    <!--Contenido Principal-->
    <main class="container-fluid">
        <div class="row">
            <form class="col-md-8 col-center infoPerfil" action="<?php echo base_url() . "index.php/Administrador/modificaTecnico"; ?>" method="POST" id="formularioLogin">
                <legend>Modificar Técnico</legend>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="uNick">Nick</label>
                        <input type="text" class="form-control" id="tNick" name="tNick" placeholder="Nick Técnico" value='<?php echo $tecnico[0]['tNick'] ?>' required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="uContrasena">Contraseña</label>
                        <input type="text" class="form-control" id="tContrasena" name="tContrasena" placeholder="Contraseña Técnico" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uNombre">Nombre</label>
                        <input type="text" class="form-control" id="tNombre" name="tNombre" placeholder="Nombre Técnico" value='<?php echo $tecnico[0]['tNombre'] ?>' required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="uApellidos">Apellidos</label>
                        <input type="text" class="form-control" id="tApellidos" name="tApellidos" placeholder="Apellidos Técnico" value='<?php echo $tecnico[0]['tApellidos'] ?>' required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uMail">Email</label>
                        <input type="email" class="form-control" id="tMail" name="tMail" placeholder="Email Técnico" value='<?php echo $this->encrypt->decode($tecnico[0]['tMail']); ?>' required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uTelefono">Teléfono</label>
                        <input type="tel" class="form-control" id="tTelefono" name="tTelefono" placeholder="Teléfono Técnico" value='<?php echo $this->encrypt->decode($tecnico[0]['tTelefono']); ?>' required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="hidden" class="form-control" id="tID" name="tID" value='<?php echo $tecnico[0]['id'] ?>' required>
                    </div>
                    <br>
                </div>
                <span><button type="submit" class="btn btn-primary">Actualizar</button> &nbsp; <a class="btn btn-secondary" href="<?php echo base_url() . "index.php/Administrador/verTecnicosPanelAdmin" ?>">Volver</a></span>

            </form>

        </div>
    </main>
</body>

<!--Carga de Scripts-->
<script src="<?php echo base_url() . "assets/"; ?>js/jquery-3.6.0.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/funciones.js"></script>

</html>