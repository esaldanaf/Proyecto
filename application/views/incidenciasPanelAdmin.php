<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Incidencias - Panel Administrador</title>
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
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Administrador/verUsuariosPanelAdmin" ?>">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Administrador/verTecnicosPanelAdmin" ?>">Técnicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active-nav-link" href="<?php echo base_url() . "index.php/Administrador/verIncidenciasPanelAdmin" ?>">Incidencias</a>
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
        <h3>Listado de Incidencias</h3>
        <hr>

        <div class="btn-group float-right" role="group" aria-label="Basic example">
            <!--Botonera Filtrado-->
            <form action="<?php echo base_url() . "index.php/Administrador/filtrarIncidencia"; ?>" method="POST" id="filtraIncidencias">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group flex-wrap" role="group">
                        <button type="submit" class="btn btn-secondary" name="estado" id="nueva" value="nueva">Nueva</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="asignada" value="asignada">Asignada</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="parada" value="parada">Parada</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="resuelta" value="resuelta">Resuelta</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="archivada" value="archivada">Archivada</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="todo" value="todo">Todo</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <form action="<?php echo base_url() . "index.php/Administrador/actualizarIncidencia"; ?>" method="POST" id="formularioLogin">
                <table id="tablaIncidencias" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tecnico</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Tipo Incidencia</th>
                            <th scope="col">Prioridad</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="rellenoIncidencias">
                        <?php
                        foreach ($listaIncidencias as $filaIncidencia) {
                            echo '<tr id="filaIncidencia" class="">
                                    <th scope="row">' . $filaIncidencia['idI'] . '</th>
                                    <td id="tecnicoIncidencia">' . $filaIncidencia['tNick'] . '</td>
                                    <td id="usuarioIncidencia">' . $filaIncidencia['uNick'] . '</td>
                                    <td id="tipoidIncidencia">' . $filaIncidencia['tipo'] . '</td>
                                    <td id="prioridadIncidencia" value="' . $filaIncidencia['prioridad'] . '">' . $filaIncidencia['prioridad'] . '</td>
                                    <td id="estadoIncidencia">' . $filaIncidencia['estado'] . '</td>
                                    <td id="empresaIncidencia">' . $filaIncidencia['empresa'] . '</td>
                                    <td id="fechaIncidencia">' . $filaIncidencia['fecha'] . '</td>
                                    <td><button class="btn btn-info" type="submit" name="modificar" id="modificar" value=' . $filaIncidencia['idI'] . '>Modificar</button></td>
                                    <td><button class="btn btn-danger" type="submit" name="eliminar" id="eliminar" value=' . $filaIncidencia['idI'] . '>Eliminar</button></td>
                                </tr>';
                        } ?>

                    </tbody>
                </table>
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
<script>
    //Script jQuery que crea el coloreado según prioridad
    $(document).ready(function() {
        $("table td:nth-child(5):contains(Alta)").parents("tr").addClass('table-danger');
        $("table td:nth-child(5):contains(Media)").parents("tr").addClass('table-warning');
        $("table td:nth-child(5):contains(Baja)").parents("tr").addClass('table-success');
    });
</script>
<script>
    /*Abandonado: Debería funcionar si el filtrado se hiciera en cliente, 
como se hace desde servidor se va a recargar la página al cargar la vista y no funcionará*/
    $(document).ready(function() {

        $('#todo').onclick(function() {
            $('#todo').addClass('active');
            $('#nueva').removeClass('active');
            $('#asignada').removeClass('active');
            $('#parada').removeClass('active');
            $('#resuelta').removeClass('active');
            $('#archivada').removeClass('active');
        });
        $('#nueva').onclick(function() {
            $('#nueva').addClass('active');
            $('#todo').removeClass('active');
            $('#asignada').removeClass('active');
            $('#parada').removeClass('active');
            $('#resuelta').removeClass('active');
            $('#archivada').removeClass('active');
        });

    });
</script>

</html>