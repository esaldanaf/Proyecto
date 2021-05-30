<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Incidencias - Panel Técnico</title>
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
                    <a class="nav-link active-nav-link" href="<?php echo base_url() . "index.php/Tecnico/verAgendaIncidencia" ?>">Mis Incidencias</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto" style="float: right !important;">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Chat/verMensajeriaTecnico" ?>">Mensajería</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Tecnico/verPerfilTecnico" ?>">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Tecnico/logout" ?>">Cerrar Sesión</a>
                </li>
            </ul>

        </div>
    </nav>
    <!--Contenido Principal-->
    <main class="container-fluid">

        <h3>Mis Incidencias</h3>
        <hr>
        <div class="float-right" role="group" aria-label="Basic example">
            <!--Botonera Filtrado-->
            <form action="<?php echo base_url() . "index.php/Tecnico/filtrarIncidencia"; ?>" method="POST" id="filtraIncidencias">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group flex-wrap" role="group">
                        <button type="submit" class="btn btn-secondary" name="estado" id="asignada" value="asignada">Asignada</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="parada" value="parada">Parada</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="resuelta" value="resuelta">Resuelta</button>
                        <button type="submit" class="btn btn-secondary" name="estado" id="todo" value="todo">Todo</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <form action="<?php echo base_url() . "index.php/Tecnico/verIncidencia"; ?>" method="POST" id="agendaIncidencias">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tipo Incidencia</th>
                            <th scope="col">Prioridad</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Ver +</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($agendaIncidencias as $filaIncidencia) {
                            echo '<tr class="table-secondary">
                                    <th scope="row">' . $filaIncidencia['id'] . '</th>
                                    <td>' . $filaIncidencia['tipo'] . '</td>
                                    <td>' . $filaIncidencia['prioridad'] . '</td>
                                    <td>' . $filaIncidencia['estado'] . '</td>
                                    <td>' . $filaIncidencia['empresa'] . '</td>
                                    <td>' . $filaIncidencia['fecha'] . '</td>
                                    <td><button class="btn btn-info" type="submit" name="detalles" id="vetalles" value=' . $filaIncidencia['id'] . '>Ver Detalles</button></td>
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
        $("table td:nth-child(3):contains(Alta)").parents("tr").addClass('table-danger');
        $("table td:nth-child(3):contains(Media)").parents("tr").addClass('table-warning');
        $("table td:nth-child(3):contains(Baja)").parents("tr").addClass('table-success');
    });
</script>

</html>