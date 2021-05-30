<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function verIndex()
    {
        $this->load->view('index');
    }
    
    public function verLoginAdmin(){
        $this->load->view('loginAdmin');
    }

    public function verPanelAdmin(){
        $this->load->view('panelAdmin');
    }

    public function verUsuariosPanelAdmin(){
        $this->load->model('AdministradorModel');
        $data['listaUsuarios'] = $this->AdministradorModel->listarUsuarios();
        $this->load->view('usuariosPanelAdmin',$data);
    }

    public function verTecnicosPanelAdmin()
    {
        $this->load->model('AdministradorModel');
        $data['listaTecnicos'] = $this->AdministradorModel->listarTecnicos();
        $this->load->view('tecnicosPanelAdmin', $data);
    }

    public function verIncidenciasPanelAdmin()
    {
        $this->load->model('AdministradorModel');
        $data['listaIncidencias'] = $this->AdministradorModel->listarIncidencias();
        $this->load->view('incidenciasPanelAdmin', $data);
    }

    public function filtrarIncidencia(){
        $opcion = $this->input->post('estado');
        $this->load->model('AdministradorModel');
        $data['listaIncidencias'] = $this->AdministradorModel->filtroIncidencias($opcion);
        $this->load->view('incidenciasPanelAdmin', $data);
    }

    

    public function login(){
        $nickAdmin = strtolower($this->input->post('nickAdmin'));
        $contrasenaAdmin = strtolower($this->input->post('contrasenaAdmin'));

        $this->load->model('AdministradorModel');
        if ($nickAdmin && $contrasenaAdmin && $this->AdministradorModel->validarAdmin($nickAdmin, $contrasenaAdmin)) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Logueado con éxito!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->load->view('panelAdmin');
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Contraseña y/o usuario incorrecto.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->load->view('loginAdmin');
        }
        
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->load->view('index');
    }

    public function nuevoUsuario(){
        $nickUsuario= strtolower($this->input->post('uNick')); 
        $contrasenaUsuario= strtolower($this->input->post('uContrasena')); 
        $nombreUsuario=$this->input->post('uNombre'); 
        $apellidosUsuario=$this->input->post('uApellidos'); 
        $emailUsuario=$this->input->post('uMail'); 
        $telefonoUsuario=$this->input->post('uTelefono'); 
        $empresaUsuario=$this->input->post('uEmpresa');

        $this->load->library('encrypt');
        $emailUsuario = $this->encrypt->encode($emailUsuario);
        $telefonoUsuario = $this->encrypt->encode($telefonoUsuario);
        $contrasenaUsuario = password_hash($contrasenaUsuario, PASSWORD_DEFAULT);
        $this->load->model('AdministradorModel');
        $comprobante = $this->AdministradorModel-> nickUsuario($nickUsuario);
        if ($comprobante) {
            if ($this->AdministradorModel->nuevoUsuario($nickUsuario, $contrasenaUsuario, $nombreUsuario, $apellidosUsuario, $emailUsuario, $telefonoUsuario, $empresaUsuario)) {
                $this->verUsuariosPanelAdmin();
            }
            
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Nick de usuario ya existe.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->verUsuariosPanelAdmin();
        }

        
        
        
    }

    public function nuevoTecnico()
    {
        $nickTecnico = strtolower($this->input->post('tNick'));
        $contrasenaTecnico = strtolower($this->input->post('tContrasena'));
        $nombreTecnico = $this->input->post('tNombre');
        $apellidosTecnico = $this->input->post('tApellidos');
        $emailTecnico = $this->input->post('tMail');
        $telefonoTecnico = $this->input->post('tTelefono');

        $this->load->library('encrypt');
        $emailTecnico = $this->encrypt->encode($emailTecnico);
        $telefonoTecnico = $this->encrypt->encode($telefonoTecnico);
        $contrasenaTecnico = password_hash($contrasenaTecnico, PASSWORD_DEFAULT);
        
        $this->load->model('AdministradorModel');
        $comprobante = $this->AdministradorModel->nickTecnico($nickTecnico);
        if ($comprobante) {
            if ($this->AdministradorModel->nuevoTecnico($nickTecnico, $contrasenaTecnico, $nombreTecnico, $apellidosTecnico, $emailTecnico, $telefonoTecnico)) {
                $this->verTecnicosPanelAdmin();
            }
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Nick de técnico ya existe.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->verTecnicosPanelAdmin();
        }
        
        
    }

    public function actualizarUsuario(){
        if ($this->input->post('eliminar')) {
            $id = $this->input->post('eliminar');
            $this->load->model('AdministradorModel');
            $this->AdministradorModel->deleteUsuario($id);
            $this->verUsuariosPanelAdmin();
        }
        if ($this->input->post('modificar')){
            $id = $this->input->post('modificar');
            $this->load->model('AdministradorModel');
            $data['usuario'] = $this->AdministradorModel->cargaUsuario($id);
            $this->load->view('modificaUsuario', $data);
        }
    }

    public function actualizarTecnico()
    {
        if ($this->input->post('eliminar')) {
            $id = $this->input->post('eliminar');
            $this->load->model('AdministradorModel');
            $this->AdministradorModel->deleteTecnico($id);
            $this->verTecnicosPanelAdmin();
        }
        if ($this->input->post('modificar')) {
            $id = $this->input->post('modificar');
            $this->load->model('AdministradorModel');
            $data['tecnico'] = $this->AdministradorModel->cargaTecnico($id);
            $this->load->view('modificaTecnico', $data);
        }
    }

    public function actualizarIncidencia()
    {
        if ($this->input->post('eliminar')) {
            $id = $this->input->post('eliminar');
            $this->load->model('AdministradorModel');
            $this->AdministradorModel->deleteIncidencia($id);
            $this->verIncidenciasPanelAdmin();
        }
        if ($this->input->post('modificar')) {
            $id = $this->input->post('modificar');
            $this->load->model('AdministradorModel');
            $data1['incidencia'] = $this->AdministradorModel->cargaIncidencia($id);
            $data2['listaTecnicos'] = $this->AdministradorModel->listarTecnicos();
            $data3['listaUsuarios'] = $this->AdministradorModel->listarUsuarios();
            $mergedData= array_merge($data1, $data2, $data3);
            $this->load->view('modificaIncidencia', $mergedData);
           
        }
    }
    
public function modificaUsuario(){
        $nickUsuario = strtolower($this->input->post('uNick'));
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

        $this->load->model('AdministradorModel');
        $this->AdministradorModel->updateUsuario($nickUsuario, $contrasenaUsuario, $nombreUsuario, $apellidosUsuario, $emailUsuario, $telefonoUsuario, $empresaUsuario, $id);
        $this->verUsuariosPanelAdmin();
}

    public function modificaTecnico()
    {
        $nickTecnico = strtolower($this->input->post('tNick'));
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

        $this->load->model('AdministradorModel');
        $this->AdministradorModel->updateTecnico($nickTecnico, $contrasenaTecnico, $nombreTecnico, $apellidosTecnico, $emailTecnico, $telefonoTecnico,$id);
        $this->verTecnicosPanelAdmin();
    }

    public function modificaIncidencia()
    {
        $idTecnico = $this->input->post('idTecnico');
        $idUsuario = $this->input->post('idUsuario');
        $tipoInciencia = $this->input->post('tipo');
        $prioridadInciencia = $this->input->post('prioridad');
        $estadoInciencia = $this->input->post('estado');
        $empresaInciencia = $this->input->post('empresa');
        $textoIncidencia = $this->input->post('texto');
        $idI = $this->input->post('idI');

        $this->load->model('AdministradorModel');
        $this->AdministradorModel->updateIncidencia($idTecnico, $idUsuario, $tipoInciencia, $prioridadInciencia, $estadoInciencia, $empresaInciencia, $textoIncidencia, $idI);
        $this->verIncidenciasPanelAdmin();
    }


    

}


