<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Incidencia - Panel Tecnico</title>
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
        <div class="row justify-content-center">
            <form class="col-md-8 col-center fichaIncidencia" action="<?php echo base_url() . "index.php/Tecnico/modificaIncidencia"; ?>" method="POST" id="formularioLogin">
                <legend>Ver Incidencia Nº <?php echo $incidencia[0]['idI'] ?></legend>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="idUsuario">Iniciada por usuario <b><?php echo $incidencia[0]['uNick'] ?></b> con id:</label>
                        <input type="text" class="form-control" id="idUsuario" name="idUsuario" placeholder="ID Usuario" value='<?php echo $incidencia[0]['idU'] ?>' readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value='<?php echo $incidencia[0]['empresa'] ?>' readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="empresa">Fecha</label>
                        <input type="text" class="form-control" id="fecha" name="fecha" placeholder="fecha" value='<?php echo $incidencia[0]['fecha'] ?>' readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tipo">Tipo de Incidencia</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo" value='<?php echo $incidencia[0]['tipo'] ?>' readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="prioridad">Prioridad</label>
                        <input type="text" class="form-control" id="prioridad" name="prioridad" placeholder="prioridad" value='<?php echo $incidencia[0]['prioridad'] ?>' readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value='<?php echo $incidencia[0]['estado'] ?>'><?php echo $incidencia[0]['estado'] ?></option>
                            <option value='Asignada'>Asignada</option>
                            <option value='Parada'>Parada</option>
                            <option value='Resuelta'>Resuelta</option>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="texto">Texto Descripción</label>
                        <textarea class="form-control" id="texto" name="texto" rows="5" readonly><?php echo $incidencia[0]['texto'] ?></textarea>
                    </div>
                    <div class="form-group col-md-5">
                        <img class="miniaturaIncidencia" src="<?php echo (base_url() . 'uploads/' . $incidencia[0]['imagen']) ?>" alt="miniatura-img">
                        <input type="hidden" class="form-control" id="id" name="id" value='<?php echo $incidencia[0]['idI'] ?>' required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Modificar</button></span>
                    <a class="btn btn-secondary btn-block" href="<?php echo base_url() . "index.php/Tecnico/verAgendaIncidencia" ?>">Volver</a>
                    <br>
                </div>
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