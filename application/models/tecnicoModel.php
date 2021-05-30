<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TecnicoModel extends CI_Model {

    

    public function validarTecnico($nickTecnico, $contrasenaTecnico) {

        $this->db->select('*');
        $this->db->from('tecnico');
        $this->db->where('tNick', $nickTecnico);
        $resultado = $this->db->get();
        $array = $resultado->result_array();

        if (!$array) {
            return false;
        } else {
            if (password_verify($contrasenaTecnico, $array[0]['tContrasena'])) {
                $this->inicioSesion($array[0]);
                return true;
            }
        }
    }

    public function inicioSesion($tecnico) {
        $this->session->set_userdata(array(
            'rol' => 'tecnico',
            'nick' => $tecnico['tNick'],
            'contrasena' => $tecnico['tContrasena'],
            'nombre' => $tecnico['tNombre'],
            'apellidos' => $tecnico['tApellidos'],
            'telefono' => $tecnico['tTelefono'],
            'email' => $tecnico['tMail'],
            'id' => $tecnico['id'],
            'isLoggedIn' => true,
            )
        );
        
    }

    public function updateTecnico($contrasenaTecnico, $nombreTecnico, $apellidosTecnico, $emailTecnico, $telefonoTecnico, $id)
    {
        $this->db->set('tContrasena', $contrasenaTecnico);
        $this->db->set('tNombre', $nombreTecnico);
        $this->db->set('tApellidos', $apellidosTecnico);
        $this->db->set('tMail', $emailTecnico);
        $this->db->set('tTelefono', $telefonoTecnico);
        $this->db->where('id', $id);
        if ($this->db->update('tecnico')) {
            $this->session->set_userdata(
                array(
                    'rol' => 'tecnico',
                    'contrasena' => $contrasenaTecnico,
                    'nombre' => $nombreTecnico,
                    'apellidos' => $apellidosTecnico,
                    'telefono' =>  $telefonoTecnico,
                    'email' => $emailTecnico,
                    'id' => $id,
                    'isLoggedIn' => true,
                )
            );
            return true;
        } else {
            return false;
        }
    }

    public function listarNuevasIncidencias(){
        $this->db->select('*');
        $this->db->from('incidencia');
        $this->db->where('estado','Nueva');
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
                $this->db->where('estado !=', 'Nueva');
                $this->db->where('estado !=', 'Archivada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'asignada':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('estado', 'Asignada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'parada':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('estado', 'Parada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'resuelta':
                $this->db->select('*');
                $this->db->from('incidencia');
                $this->db->where('estado', 'Resuelta');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
        }
    }


    public function addIncidencia($id, $idTecnico)
    {
        $this->db->set('idTecnico', $idTecnico);
        $this->db->set('estado', 'Asignada');
        $this->db->where('id', $id);
        if ($this->db->update('incidencia'))
        return true;
        else
        return false;
    }

    public function listarAgendaIncidencias(){
        $this->db->select('*');
        $this->db->from('incidencia');
        $this->db->where('idTecnico', $this->session->userdata('id'));
        $this->db->where('estado !=', 'Archivada');
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
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

    public function updateIncidencia($estadoInciencia, $id)
    {
        
        $this->db->set('estado', $estadoInciencia);
        $this->db->where('id', $id);
        if ($this->db->update('incidencia'))
        return true;
        else
            return false;
    }

    

}
?>