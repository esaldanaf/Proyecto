<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UsuarioModel extends CI_Model {

    

    public function validarUsuario($nickUsuario, $contrasenaUsuario) {

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('uNick', $nickUsuario);
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        
        if(!$array){
            return false;
        }else {
            if (password_verify($contrasenaUsuario, $array[0]['uContrasena'])) {
                $this->inicioSesion($array[0]);
                return true;
            }
        }

        
    }

    public function inicioSesion($usuario) {
        $this->session->set_userdata(array(
            'rol' => 'usuario',
            'nick' => $usuario['uNick'],
            'contrasena' => $usuario['uContrasena'],
            'nombre' => $usuario['uNombre'],
            'apellidos' => $usuario['uApellidos'],
            'telefono' => $usuario['uTelefono'],
            'email' => $usuario['uMail'],
            'empresa' => $usuario['uEmpresa'],
            'id' => $usuario['id'],
            'isLoggedIn' => true,
            )
        );
        
    }

    public function updateUsuario($contrasenaUsuario, $nombreUsuario, $apellidosUsuario, $emailUsuario, $telefonoUsuario, $empresaUsuario, $id)
    {
        $this->db->set('uContrasena', $contrasenaUsuario);
        $this->db->set('uNombre', $nombreUsuario);
        $this->db->set('uApellidos', $apellidosUsuario);
        $this->db->set('uMail', $emailUsuario);
        $this->db->set('uTelefono', $telefonoUsuario);
        $this->db->set('uEmpresa', $empresaUsuario);
        $this->db->where('id', $id);
        if ($this->db->update('usuario')){
            $this->session->set_userdata(
                array(
                    'rol' => 'usuario',
                    'contrasena' => $contrasenaUsuario,
                    'nombre' => $nombreUsuario,
                    'apellidos' => $apellidosUsuario,
                    'telefono' =>  $telefonoUsuario,
                    'email' => $emailUsuario,
                    'empresa' => $empresaUsuario,
                    'id' => $id,
                    'isLoggedIn' => true,
                )
            );
            return true;
        }    
        else{
            return false;
        }
            
    }

    public function insertarIncidencia($idUsuarioIncidencia, $empresaIncidencia, $tipoIncidencia, $prioridadIncidencia, $textoIncidencia, $imagenIncidencia){
        
        $data = array(
            'idUsuario' => $idUsuarioIncidencia,
            'tipo' => $tipoIncidencia,
            'prioridad' => $prioridadIncidencia,
            'empresa' => $empresaIncidencia,
            'texto' => $textoIncidencia,
            'imagen' => $imagenIncidencia,
            
        );

        if ($this->db->insert('incidencia', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function listarMisIncidencias(){
        $this->db->select('*');
        $this->db->from('incidencia');
        $this->db->where('idUsuario', $this->session->userdata('id'));
        $this->db->where('estado !=', 'Archivada');
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }

    public function filtroIncidencias($opcion)
    {
        switch ($opcion) {
            case 'todo':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('idUsuario', $this->session->userdata('id'));
                $this->db->where('estado !=', 'Archivada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'nueva':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('idUsuario', $this->session->userdata('id'));
                $this->db->where('estado', 'Nueva');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'asignada':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('idUsuario', $this->session->userdata('id'));
                $this->db->where('estado', 'Asignada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'parada':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('idUsuario', $this->session->userdata('id'));
                $this->db->where('estado', 'Parada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'resuelta':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('idUsuario', $this->session->userdata('id'));
                $this->db->where('estado', 'Resuelta');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
        }
    }


    public function cargaIncidencia($id)
    {
        $this->db->select('incidencia.id AS idI, tecnico.id AS idT, usuario.id as idU, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
        $this->db->from('incidencia', 'usuario', 'tecnico');
        $this->db->join('usuario', 'usuario.id = incidencia.idUsuario', 'left');
        $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico', 'left');
        $this->db->where('incidencia.id', $id);
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }

    public function updateIncidencia($tipoInciencia, $prioridadInciencia, $textoInciencia,  $id)
    {

        $this->db->set('tipo', $tipoInciencia);
        $this->db->set('prioridad', $prioridadInciencia);
        $this->db->set('texto', $textoInciencia);
        $this->db->where('id', $id);
        if ($this->db->update('incidencia'))
        return true;
        else
            return false;
    }
    

    

}
?>