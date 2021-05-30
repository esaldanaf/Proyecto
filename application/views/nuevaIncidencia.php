<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Incidencia - Panel Usuario</title>
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
                    <a class="nav-link active-nav-link" href="<?php echo base_url() . "index.php/Usuario/verNuevaIncidencia" ?>">Crear Incidencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Usuario/verMisIncidencias" ?>">Mis Incidencias</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto" style="float: right !important;">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() . "index.php/Chat/verMensajeriaUsuario" ?>"">Mensajería</a>
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
    <main class="container-fluid">
        <div class="row justify-content-center">
            <form class="col-md-8 col-center introNuevo" action="<?php echo base_url() . "index.php/Usuario/nuevaIncidencia" ?>" method="POST" id="formularioIncidencia" enctype="multipart/form-data">
                <legend>Introduce una nueva incidencia</legend>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="iTipo">Tipo de Incidencia</label>
                        <select class="form-control" id="iTipo" name="iTipo">
                            <option value='Hardware'>Hardware</option>
                            <option value='Software'>Software</option>
                            <option value='Red'>Red</option>
                            <option value='Suministro'>Suministro</option>
                            <option value='Otros'>Otros</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="iPrioridad">Prioridad</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="iPrioridad" id="iPrioridad" value="Alta"> Alta
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="iPrioridad" id="iPrioridad" value="Media" checked=""> Media
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="iPrioridad" id="iPrioridad" value="Baja"> Baja
                            </label>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-12">
                            <label for="iTexto">Texto Descripción</label>
                            <textarea class="form-control" id="iTexto" name="iTexto" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-12">
                            <label for="iImagen">Inserte Imagen Auxiliar</label>
                            <input type="file" class="form-control-file" id="iImagen" name="iImagen">
                            <small class="form-text" >Aquí puede adjuntar una imagen que ayude a la resolución de su incidencia.</small>
                        </div>
                    </div>

                    <input type="hidden" id="iUsuario" name="iUsuario" value="<?php echo ($this->session->userdata('id')); ?>">
                    <input type="hidden" id="iEmpresa" name="iEmpresa" value="<?php echo ($this->session->userdata('empresa')); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Enviar Incidencia</button>
            </form>

        </div>
        <br>

    </main>
    <br>
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