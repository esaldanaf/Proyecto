<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Usuario extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // Form
        $this->load->helper('form', 'url');
        // Librerias
        $this->load->library('form_validation');
    }

    public function verLoginUsuario(){
        $this->load->view('loginUsuario');
    }

    public function verPanelUsuario(){
        $this->load->view('panelUsuario');
    }

    public function verNuevaIncidencia(){
        $this->load->view('nuevaIncidencia');
    }
    public function verMisIncidencias(){
        $this->load->model('UsuarioModel');
        $data['misIncidencias'] = $this->UsuarioModel->listarMisIncidencias();
        $this->load->view('misIncidencias', $data);
    }

    public function filtrarIncidencia()
    {
        $opcion = $this->input->post('estado');
        $this->load->model('UsuarioModel');
        $data['misIncidencias'] = $this->UsuarioModel->filtroIncidencias($opcion);
        $this->load->view('misIncidencias', $data);
    }

    public function verPerfilUsuario()
    {
        $this->load->view('perfilUsuario');
    }

    public function verIncidencia()
    {
        $id = $this->input->post('detalles');
        $this->load->model('UsuarioModel');
        $data['incidencia'] = $this->UsuarioModel->cargaIncidencia($id);
        $this->load->view('vistaIncidencia', $data);
    }

    public function login()
    {
        $nickUsuario =  strtolower ($this->input->post('nickUsuario'));
        $contrasenaUsuario = strtolower($this->input->post('contrasenaUsuario'));

        $this->load->model('UsuarioModel');
        if ($nickUsuario && $contrasenaUsuario && $this->UsuarioModel->validarUsuario($nickUsuario, $contrasenaUsuario)) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Logueado con éxito!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->load->view('panelUsuario');
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Contraseña y/o usuario incorrecto.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->load->view('loginUsuario');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('index');
    }

    public function modificaPerfil(){
        $contrasenaUsuario = strtolower($this->input->post('uContrasena'));
        $nombreUsuario = $this->input->post('uNombre');
        $apellidosUsuario = $this->input->post('uApellidos');
        $emailUsuario = $this->input->post('uMail');
        $telefonoUsuario = $this->input->post('uTelefono');
        $empresaUsuario = $this->input->post('uEmpresa');
        $id = $this->input->post('uID');

        $this->load->library('encrypt');
        $emailUsuario = $this->encrypt->encode($emailUsuario);
        $telefonoUsuario = $this->encrypt->encode($telefonoUsuario);

        $contrasenaUsuario = password_hash($contrasenaUsuario, PASSWORD_DEFAULT);

        $this->load->model('UsuarioModel');
        $this->UsuarioModel->updateUsuario( $contrasenaUsuario, $nombreUsuario, $apellidosUsuario, $emailUsuario, $telefonoUsuario, $empresaUsuario, $id);
        $this->verPanelUsuario();
    }

    

    public function nuevaIncidencia(){
        $config['upload_path'] = "./uploads/";
        $config['file_name'] = "img_". date('hisdmy');
        $config['allowed_types'] = "jpg|png";
        $config['max_size'] = "20000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('iImagen')){

            $data = $this->upload->data();
            $imagenIncidencia = 'no_image.jpg';
            $idUsuarioIncidencia = $this->input->post('iUsuario');
            $empresaIncidencia = $this->input->post('iEmpresa');
            $tipoIncidencia = $this->input->post('iTipo');
            $prioridadIncidencia = $this->input->post('iPrioridad');
            $textoIncidencia = $this->input->post('iTexto');

            $this->load->model('UsuarioModel');
            if ($this->UsuarioModel->insertarIncidencia($idUsuarioIncidencia, $empresaIncidencia, $tipoIncidencia, $prioridadIncidencia, $textoIncidencia, $imagenIncidencia)) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Enviada correctamente!</strong> Sin Imagen.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                $this->verPanelUsuario();
            }

            
        }else{
            $data= $this->upload->data();
            $imagenIncidencia = $data["file_name"];
            $idUsuarioIncidencia = $this->input->post('iUsuario');
            $empresaIncidencia = $this->input->post('iEmpresa');
            $tipoIncidencia = $this->input->post('iTipo');
            $prioridadIncidencia = $this->input->post('iPrioridad');
            $textoIncidencia = $this->input->post('iTexto');
            
            $this->load->model('UsuarioModel');
            if ($this->UsuarioModel->insertarIncidencia($idUsuarioIncidencia, $empresaIncidencia, $tipoIncidencia, $prioridadIncidencia, $textoIncidencia, $imagenIncidencia)) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Enviada correctamente!</strong> Contiene Imagen.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                $this->verPanelUsuario();
            }


        }
            
    }

    public function modificaIncidencia()
    {

        $tipoInciencia = $this->input->post('tipo');
        $prioridadInciencia = $this->input->post('prioridad');
        $textoInciencia = $this->input->post('texto');
        

        $id = $this->input->post('id');

        $this->load->model('UsuarioModel');
        $this->UsuarioModel->updateIncidencia($tipoInciencia, $prioridadInciencia, $textoInciencia,  $id);
        $this->verMisIncidencias();
    }

}
