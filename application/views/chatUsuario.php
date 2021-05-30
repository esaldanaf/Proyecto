<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat con Tecnico <?php echo ($tecnico[0]['tNick']); ?> - Panel Técnico</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() . "assets/"; ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url() . "assets/"; ?>img/favicon.ico" type="image/x-icon">
    <!--Estilos-->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/estilos.css">

</head>

<body>
    <p></p>
    <!--Contenido Principal-->
    <main role="main" class="container">
        <div class="container-fluid">
            <div class="ventanaChat">
                <?php
                foreach ($mensajesChat as $mensaje) {
                    if ($mensaje['emisor'] == 'usuario') {
                        echo '<div class="mensaje-emisor center-block">    
                                <div class="text-right">
                                    <h6><strong>Yo</strong></h6>
                                </div>
                                <div class="text-right blockquote">
                                    ' . $mensaje['mensaje'] . '
                                </div>
                                <div class="text-right text-muted blockquote-footer">
                                    <small>' . $mensaje['fecha'] . '</small>
                                </div>
                            </div>';
                    } else if ($mensaje['emisor'] == 'tecnico') {
                        echo '<div class="mensaje-receptor center-block">  
                                    <div class="text-left blockquote">
                                        <h6><strong>' . $tecnico[0]['tNick'] . '</strong></h6>
                                    </div>
                                    <div class="text-left blockquote">
                                        ' . $mensaje['mensaje'] . '
                                    </div>
                                    <div class="text-left text-muted blockquote-footer">
                                        <small>' . $mensaje['fecha'] . '</small>
                                    </div>
                                </div>';
                    }
                } ?></div>

            <div class="envioChat">
                <div class="center-block">
                    <div>
                        <div>
                            <form action="<?php echo base_url() . "index.php/Chat/enviarUsuario"; ?>" method="POST" id="botoneraChat">
                                <div class="input-group">
                                    <input type="hidden" name="idUsuarioChat" value="<?php echo ($this->session->userdata('id')); ?>">
                                    <input type="hidden" name="idTecnicoChat" value="<?php echo ($this->session->userdata('idTecnicoChat')); ?>">
                                    <input type="hidden" name="emisor" value="usuario">
                                    <input type="text" class="form-control" name="mensaje" required>
                                    <button class="btn btn-primary" type="submit">Enviar</button>
                                    <a class="btn btn-info" href="<?php echo base_url() . "index.php/Chat/refrescarChatUsuario" ?>">Actualizar</a>
                                    <a class="btn btn-secondary" href="<?php echo base_url() . "index.php/Chat/verMensajeriaUsuario" ?>">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
</body>

<!--Carga de Scripts-->
<script src="<?php echo base_url() . "assets/"; ?>js/jquery-3.6.0.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/bootstrap.js"></script>
<script src="<?php echo base_url() . "assets/"; ?>js/funciones.js"></script>

</html>