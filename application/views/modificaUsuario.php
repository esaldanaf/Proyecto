<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario - Panel Administrador</title>
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
            <form class="col-md-8 col-center infoPerfil" action="<?php echo base_url() . "index.php/Administrador/modificaUsuario"; ?>" method="POST" id="formularioLogin">
                <legend>Modificar Usuario</legend>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="uNick">Nick</label>
                        <input type="text" class="form-control" id="uNick" name="uNick" placeholder="Nick Usuario" value='<?php echo $usuario[0]['uNick']; ?>' required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="uContrasena">Contraseña</label>
                        <input type="text" class="form-control" id="uContrasena" name="uContrasena" placeholder="Contraseña Usuario" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uNombre">Nombre</label>
                        <input type="text" class="form-control" id="uNombre" name="uNombre" placeholder="Nombre Usuario" value='<?php echo $usuario[0]['uNombre'] ?>' required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="uApellidos">Apellidos</label>
                        <input type="text" class="form-control" id="uApellidos" name="uApellidos" placeholder="Apellidos Usuario" value='<?php echo $usuario[0]['uApellidos'] ?>' required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uMail">Email</label>
                        <input type="email" class="form-control" id="uMail" name="uMail" placeholder="Email Usuario" value='<?php echo $this->encrypt->decode($usuario[0]['uMail']); ?>' required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uTelefono">Teléfono</label>
                        <input type="tel" class="form-control" id="uTelefono" name="uTelefono" placeholder="Teléfono Usuario" value='<?php echo $this->encrypt->decode($usuario[0]['uTelefono']); ?>' required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uEmpresa">Empresa</label>
                        <input type="text" class="form-control" id="uEmpresa" name="uEmpresa" placeholder="Empresa Usuario" value='<?php echo $usuario[0]['uEmpresa'] ?>' required>
                        <input type="hidden" class="form-control" id="uID" name="uID" value='<?php echo $usuario[0]['id'] ?>' required>
                    </div>
                    <br>
                </div>
                <span><button type="submit" class="btn btn-primary">Actualizar</button> &nbsp; <a class="btn btn-secondary" href="<?php echo base_url() . "index.php/Administrador/verUsuariosPanelAdmin" ?>">Volver</a></span>

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