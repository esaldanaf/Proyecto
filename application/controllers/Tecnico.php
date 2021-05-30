<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico extends CI_Controller {

     public function verLoginTecnico(){
        $this->load->view('loginTecnico');
    }

    public function verPanelTecnico(){
        $this->load->view('panelTecnico');
    }

    public function verAsignaIncidencia(){
        $this->load->model('TecnicoModel');
        $data['nuevasIncidencias'] = $this->TecnicoModel->listarNuevasIncidencias();
        $this->load->view('asignaIncidencia',$data);
    }

    public function verAgendaIncidencia(){
        $this->load->model('TecnicoModel');
        $data['agendaIncidencias'] = $this->TecnicoModel->listarAgendaIncidencias();
        $this->load->view('agendaIncidencia',$data);
    }

    public function filtrarIncidencia()
    {
        $opcion = $this->input->post('estado');
        $this->load->model('TecnicoModel');
        $data['agendaIncidencias'] = $this->TecnicoModel->filtroIncidencias($opcion);
        $this->load->view('agendaIncidencia', $data);
    }

    public function verIncidencia(){
        $id = $this->input->post('detalles');
        $this->load->model('TecnicoModel');
        $data['incidencia'] = $this->TecnicoModel->cargaIncidencia($id);
        $this->load->view('detallesIncidencia', $data);
    }

    public function verMensajeriaTecnico(){
        $this->load->view('mensajeriaTecnico');
    }

    public function verPerfilTecnico(){
        $this->load->view('perfilTecnico');
    }

    public function login(){
        $nickTecnico = strtolower($this->input->post('nickTecnico'));
        $contrasenaTecnico = strtolower($this->input->post('contrasenaTecnico'));

        $this->load->model('TecnicoModel');
        if ($nickTecnico && $contrasenaTecnico && $this->TecnicoModel->validarTecnico($nickTecnico, $contrasenaTecnico)) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Logueado con éxito!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->load->view('panelTecnico');
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Contraseña y/o usuario incorrecto.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->load->view('loginTecnico');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('index');
    }

    public function modificaPerfil(){
        $contrasenaTecnico = strtolower($this->input->post('tContrasena'));
        $nombreTecnico = $this->input->post('tNombre');
        $apellidosTecnico = $this->input->post('tApellidos');
        $emailTecnico = $this->input->post('tMail');
        $telefonoTecnico = $this->input->post('tTelefono');
        $id = $this->input->post('tID');

        $this->load->library('encrypt');
        $emailTecnico = $this->encrypt->encode($emailTecnico);
        $telefonoTecnico = $this->encrypt->encode($telefonoTecnico);

        $contrasenaTecnico = password_hash($contrasenaTecnico, PASSWORD_DEFAULT);

        $this->load->model('TecnicoModel');
        $this->TecnicoModel->updateTecnico($contrasenaTecnico, $nombreTecnico, $apellidosTecnico, $emailTecnico, $telefonoTecnico,  $id);
        $this->verPanelTecnico();
    }

    public function asignarIncidencia()
    {
        $id = $this->input->post('asignar');
        $idTecnico = $this->session->userdata('id');
        $this->load->model('TecnicoModel');
        $this->TecnicoModel->addIncidencia($id, $idTecnico);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Incidencia nº '.$id.' asignada exitosamente.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        $this->verPanelTecnico();
    }

    public function modificaIncidencia()
    {
       
        $estadoInciencia = $this->input->post('estado');
       
        $id = $this->input->post('id');

        $this->load->model('TecnicoModel');
        $this->TecnicoModel->updateIncidencia($estadoInciencia,$id);
        $this->verAgendaIncidencia();
    }
    
}

?>
