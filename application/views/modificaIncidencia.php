<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Incidencia - Panel Administrador</title>
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
            <form class="col-md-8 col-center fichaIncidencia" action="<?php echo base_url() . "index.php/Administrador/modificaIncidencia"; ?>" method="POST" id="formularioLogin">
                <legend>Modificar Incidencia Nº <?php echo $incidencia[0]['idI'] ?></legend>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="idTecnico">Tecnico</label>
                        <select class="form-control" id="idTecnico" name="idTecnico">
                            <<option value='<?php echo $incidencia[0]['idT'] ?>'><?php echo $incidencia[0]['tNick'] ?></option>
                                <?php foreach ($listaTecnicos as $filaTecnico) {
                                    echo '<option value="' . $filaTecnico['id'] . '">' . $filaTecnico['tNick'] . ' ID:' . $filaTecnico['id'] . '</option>';
                                } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="idUsuario">Usuario</label>
                        <select class="form-control" id="idUsuario" name="idUsuario">
                            <<option value='<?php echo $incidencia[0]['idU'] ?>'><?php echo $incidencia[0]['uNick'] ?></option>
                                <?php foreach ($listaUsuarios as $filaUsuario) {
                                    echo '<option value="' . $filaUsuario['id'] . '">' . $filaUsuario['uNick'] . ' ID:' . $filaUsuario['id'] . '</option>';
                                } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value='<?php echo $incidencia[0]['empresa'] ?>' required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tipo">Tipo de Incidencia</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value='<?php echo $incidencia[0]['tipo'] ?>'><?php echo $incidencia[0]['tipo'] ?></option>
                            <option value='Hardware'>Hardware</option>
                            <option value='Software'>Software</option>
                            <option value='Red'>Red</option>
                            <option value='Suministro'>Suministro</option>
                            <option value='Otros'>Otros</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="prioridad">Prioridad</label>
                        <select class="form-control" id="prioridad" name="prioridad">
                            <option value='<?php echo $incidencia[0]['prioridad'] ?>'><?php echo $incidencia[0]['prioridad'] ?></option>
                            <option value='Alta'>Alta</option>
                            <option value='Media'>Media</option>
                            <option value='Baja'>Baja</option>

                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value='<?php echo $incidencia[0]['estado'] ?>'><?php echo $incidencia[0]['estado'] ?></option>
                            <option value='Nueva'>Nueva</option>
                            <option value='Asignada'>Asignada</option>
                            <option value='Parada'>Parada</option>
                            <option value='Resuelta'>Resuelta</option>
                            <option value='Archivada'>Archivada</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="texto">Texto Descripción</label>
                        <textarea class="form-control" id="texto" name="texto" rows="8"><?php echo $incidencia[0]['texto'] ?></textarea>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="imagen">Imágen Auxiliar</label>
                        <img class="miniaturaIncidencia" src="<?php echo (base_url() . 'uploads/' . $incidencia[0]['imagen']) ?>" alt="miniatura-img">
                        <input type="hidden" class="form-control" id="idI" name="idI" value='<?php echo $incidencia[0]['idI'] ?>' required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Actualizar</button> 
                    <a class="btn btn-secondary btn-block" href="<?php echo base_url() . "index.php/Administrador/verIncidenciasPanelAdmin" ?>">Volver</a>
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