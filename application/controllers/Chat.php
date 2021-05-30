<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        // Form
        $this->load->helper('form', 'url');
        // Librerias
        $this->load->library('form_validation');
    }

    function verMensajeriaTecnico(){
        $this->load->model('ChatModel');
        $data['usuariosChat'] = $this->ChatModel->listarUsuarios();
        $this->load->view('mensajeriaTecnico',$data);

    }
    
    function abrirChatTecnico(){  
        $uId = $this->input->post('idUsuario');
        $tId = $this->session->userdata('id');
        $this->session->set_userdata('idUsuarioChat', $uId);
        
        $this->load->model('AdministradorModel');
        $data['usuario']= $this->AdministradorModel->cargaUsuario($uId);
        
        $this->load->model('ChatModel');
        $data['mensajesChat'] = $this->ChatModel->chatTecnico($uId,$tId);
        $this->load->view('chatTecnico',$data);
    }

    function refrescarChatTecnico(){
        $idUsuarioChat = $this->session->userdata('idUsuarioChat');
        $idTecnicoChat=$this->session->userdata('id');

        $this->load->model('AdministradorModel');
        $data['usuario'] = $this->AdministradorModel->cargaUsuario($idUsuarioChat);
        
        $this->load->model('ChatModel');
        $data['mensajesChat'] = $this->ChatModel->chatTecnico($idUsuarioChat, $idTecnicoChat);
        $this->load->view('chatTecnico', $data);
    }

    function enviarTecnico(){
        $idTecnicoChat = $this->input->post('idTecnicoChat');
        $idUsuarioChat = $this->input->post('idUsuarioChat');
        $emisorChat = $this->input->post('emisor');
        $mensajeChat = $this->input->post('mensaje');

        $this->load->model('ChatModel');
        if ($this->ChatModel->insertarChat($idTecnicoChat, $idUsuarioChat, $emisorChat, $mensajeChat)) {
            $this->refrescarChatTecnico();
        }
    }

    function verMensajeriaUsuario(){
        $this->load->model('ChatModel');
        $data['tecnicosChat'] = $this->ChatModel->listarTecnicos();
        $this->load->view('mensajeriaUsuario', $data);
    }

    function abrirChatUsuario(){
        $tId = $this->input->post('idTecnico');
        $uId = $this->session->userdata('id');
        $this->session->set_userdata('idTecnicoChat', $tId);

        $this->load->model('AdministradorModel');
        $data['tecnico'] = $this->AdministradorModel->cargaTecnico($tId);

        $this->load->model('ChatModel');
        $data['mensajesChat'] = $this->ChatModel->chatUsuario($uId, $tId);
        $this->load->view('chatUsuario', $data);

    }
    function refrescarChatUsuario()
    {
        $idUsuarioChat = $this->session->userdata('id');
        $idTecnicoChat = $this->session->userdata('idTecnicoChat');

        $this->load->model('AdministradorModel');
        $data['tecnico'] = $this->AdministradorModel->cargaTecnico($idTecnicoChat);

        $this->load->model('ChatModel');
        $data['mensajesChat'] = $this->ChatModel->chatUsuario($idUsuarioChat, $idTecnicoChat);
        $this->load->view('chatUsuario', $data);
    }
    function enviarUsuario()
    {
        $idTecnicoChat = $this->input->post('idTecnicoChat');
        $idUsuarioChat = $this->input->post('idUsuarioChat');
        $emisorChat = $this->input->post('emisor');
        $mensajeChat = $this->input->post('mensaje');

        $this->load->model('ChatModel');
        if ($this->ChatModel->insertarChat($idTecnicoChat, $idUsuarioChat, $emisorChat, $mensajeChat)) {
            $this->refrescarChatUsuario();
        }
    }

    
    
}

?>
