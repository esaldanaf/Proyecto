<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios - Panel Administrador</title>
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
        <a class="navbar-brand" href="<?php echo base_url() . "index.php/Administrador/verPanelAdmin" ?>"><img src="<?php echo base_url() . "assets/"; ?>img/Logo3.png" alt="Logo" style="width:40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barraNavegacion" aria-controls="barraNavegacion" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="barraNavegacion">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active-nav-link" href="<?php echo base_url() . "index.php/Administrador/verUsuariosPanelAdmin" ?>">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Administrador/verTecnicosPanelAdmin" ?>">Técnicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Administrador/verIncidenciasPanelAdmin" ?>">Incidencias</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto" style="float: right !important;">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Administrador/logout" ?>">Cerrar Sesión</a>
                </li>
            </ul>

        </div>
    </nav>
    <!--Contenido Principal-->
    <main class="container-fluid">
        <h3>Listado de Usuarios</h3>
        <hr>
        <div class="table-responsive">
            <form action="<?php echo base_url() . "index.php/Administrador/actualizarUsuario"; ?>" method="POST" id="formularioLogin">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nick</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listaUsuarios as $filaUsuario) {
                            echo '<tr class="table-secondary">
                                    <th scope="row">' . $filaUsuario['id'] . '</th>
                                    <td>' . $filaUsuario['uNick'] . '</td>
                                    <td>' . $filaUsuario['uContrasena'] . '</td>
                                    <td>' . $filaUsuario['uNombre'] . '</td>
                                    <td>' . $filaUsuario['uApellidos'] . '</td>
                                    <td>' . $filaUsuario['uEmpresa'] . '</td>
                                    <td><button class="btn btn-info" type="submit" name="modificar" id="modificar" value=' . $filaUsuario['id'] . '>Modificar</button></td>
                                    <td><button class="btn btn-danger" type="submit" name="eliminar" id="eliminar" value=' . $filaUsuario['id'] . '>Eliminar</button></td>
                                </tr>';
                        } ?>

                    </tbody>
                </table>
            </form>
        </div>
        <div class="row justify-content-center">
            <form class="col-md-8 col-center introNuevo" action="<?php echo base_url() . "index.php/Administrador/nuevoUsuario"; ?>" method="POST" id="formularioLogin">
                <legend>Nuevo Usuario</legend>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="uNick">Nick</label>
                        <input type="text" class="form-control" id="uNick" name="uNick" placeholder="Nick Usuario" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="uContrasena">Contraseña</label>
                        <input type="password" class="form-control" id="uContrasena" name="uContrasena" placeholder="Contraseña Usuario" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uNombre">Nombre</label>
                        <input type="text" class="form-control" id="uNombre" name="uNombre" placeholder="Nombre Usuario" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="uApellidos">Apellidos</label>
                        <input type="text" class="form-control" id="uApellidos" name="uApellidos" placeholder="Apellidos Usuario" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="uMail">Email</label>
                        <input type="email" class="form-control" id="uMail" name="uMail" placeholder="Email Usuario" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uTelefono">Teléfono</label>
                        <input type="tel" class="form-control" id="uTelefono" name="uTelefono" placeholder="Teléfono Usuario" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="uEmpresa">Empresa</label>
                        <input type="text" class="form-control" id="uEmpresa" name="uEmpresa" placeholder="Empresa Usuario" required>
                    </div>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            </form>

        </div>
        <br>
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