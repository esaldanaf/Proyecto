<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdministradorModel extends CI_Model {

    public function validarAdmin($nickAdmin, $contrasenaAdmin) {

        $this->db->select('*');
        $this->db->from('administrador');
        $this->db->where('aNick', $nickAdmin);
        $this->db->where('aContrasena', $contrasenaAdmin);
        $resultado = $this->db->get();
        $array = $resultado->result_array();

        if(!$array){
            return false;
        } else {
            if (count($array) == 1) {
                $this->inicioSesion($array[0]);
                return true;
            }
        }
        
    }

    public function inicioSesion($admin) {
        $this->session->set_userdata(array(
            'rol' => 'administrador',
            'nick' => $admin['aNick'],
            'contrasena' => $admin['aContrasena'],
            'isLoggedIn' => true,
             
                )
        );
        
    }

    public function listarUsuarios()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }

    public function listarTecnicos()
    {
        $this->db->select('*');
        $this->db->from('tecnico');
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }

    public function listarIncidencias()
    {
        $this->db->select('incidencia.id AS idI, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
        $this->db->from('incidencia','usuario','tecnico');
        $this->db->join('usuario', 'usuario.id = incidencia.idUsuario','left');
        $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico','left');
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }

    public function filtroIncidencias($opcion)
    {
        switch ($opcion){
            case 'todo':
                $this->db->select('incidencia.id AS idI, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
                $this->db->from('incidencia', 'usuario', 'tecnico');
                $this->db->join('usuario', 'usuario.id = incidencia.idUsuario', 'left');
                $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico', 'left');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
            break;
            case 'nueva':
                $this->db->select('incidencia.id AS idI, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
                $this->db->from('incidencia', 'usuario', 'tecnico');
                $this->db->join('usuario', 'usuario.id = incidencia.idUsuario', 'left');
                $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico', 'left');
                $this->db->where('estado','Nueva');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
            break;
            case 'asignada':
                $this->db->select('incidencia.id AS idI, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
                $this->db->from('incidencia', 'usuario', 'tecnico');
                $this->db->join('usuario', 'usuario.id = incidencia.idUsuario', 'left');
                $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico', 'left');
                $this->db->where('estado', 'Asignada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'parada':
                $this->db->select('incidencia.id AS idI, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
                $this->db->from('incidencia', 'usuario', 'tecnico');
                $this->db->join('usuario', 'usuario.id = incidencia.idUsuario', 'left');
                $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico', 'left');
                $this->db->where('estado', 'Parada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'resuelta':
                $this->db->select('incidencia.id AS idI, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
                $this->db->from('incidencia', 'usuario', 'tecnico');
                $this->db->join('usuario', 'usuario.id = incidencia.idUsuario', 'left');
                $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico', 'left');
                $this->db->where('estado', 'Resuelta');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
            case 'archivada':
                $this->db->select('incidencia.id AS idI, tecnico.tNick, usuario.uNick, incidencia.tipo, incidencia.prioridad, incidencia.estado, incidencia.empresa,incidencia.texto,incidencia.imagen,incidencia.fecha');
                $this->db->from('incidencia', 'usuario', 'tecnico');
                $this->db->join('usuario', 'usuario.id = incidencia.idUsuario', 'left');
                $this->db->join('tecnico', 'tecnico.id = incidencia.idTecnico', 'left');
                $this->db->where('estado', 'Archivada');
                $resultado = $this->db->get();
                $array = $resultado->result_array();
                return $array;
                break;
        }
    }

    public function nuevoUsuario($nickUsuario, $contrasenaUsuario, $nombreUsuario, $apellidosUsuario, $emailUsuario, $telefonoUsuario, $empresaUsuario)
    {
        $data = array(
            'uNick' => $nickUsuario,
            'uContrasena' => $contrasenaUsuario,
            'uNombre' => $nombreUsuario,
            'uApellidos' => $apellidosUsuario,
            'uMail' => $emailUsuario,
            'uTelefono' => $telefonoUsuario,
            'uEmpresa' => $empresaUsuario
        );

        if ($this->db->insert('usuario', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function nuevoTecnico($nickTecnico, $contrasenaTecnico, $nombreTecnico, $apellidosTecnico, $emailTecnico, $telefonoTecnico)
    {
        $data = array(
            'tNick' => $nickTecnico,
            'tContrasena' => $contrasenaTecnico,
            'tNombre' => $nombreTecnico,
            'tApellidos' => $apellidosTecnico,
            'tMail' => $emailTecnico,
            'tTelefono' => $telefonoTecnico
        );

        if ($this->db->insert('tecnico', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function cargaUsuario($id) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('id', $id);
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }

    public function cargaTecnico($id)
    {
        $this->db->select('*');
        $this->db->from('tecnico');
        $this->db->where('id', $id);
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }

    public function nickUsuario($nickUsuario) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('uNick', $nickUsuario);
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        
        if (!$array) {
            return true;
        }else {
            return false;
        }
    }

    public function nickTecnico($nickTecnico)
    {
        $this->db->select('*');
        $this->db->from('tecnico');
        $this->db->where('tNick', $nickTecnico);
        $resultado = $this->db->get();
        $array = $resultado->result_array();

        if (!$array) {
            return true;
        } else {
            return false;
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

    public function updateUsuario($nickUsuario, $contrasenaUsuario, $nombreUsuario, $apellidosUsuario, $emailUsuario, $telefonoUsuario, $empresaUsuario, $id)
    {
        $this->db->set('uNick', $nickUsuario);
        $this->db->set('uContrasena', $contrasenaUsuario);
        $this->db->set('uNombre', $nombreUsuario);
        $this->db->set('uApellidos', $apellidosUsuario);
        $this->db->set('uMail', $emailUsuario);
        $this->db->set('uTelefono', $telefonoUsuario);
        $this->db->set('uEmpresa', $empresaUsuario);
        $this->db->where('id', $id);
        if ($this->db->update('usuario'))
        return true;
        else
            return false;
    }

    public function updateTecnico($nickTecnico, $contrasenaTecnico, $nombreTecnico, $apellidosTecnico, $emailTecnico, $telefonoTecnico, $id)
    {
        $this->db->set('tNick', $nickTecnico);
        $this->db->set('tContrasena', $contrasenaTecnico);
        $this->db->set('tNombre', $nombreTecnico);
        $this->db->set('tApellidos', $apellidosTecnico);
        $this->db->set('tMail', $emailTecnico);
        $this->db->set('tTelefono', $telefonoTecnico);
        $this->db->where('id', $id);
        if ($this->db->update('tecnico'))
        return true;
        else
            return false;
    }

    public function updateIncidencia($idTecnico, $idUsuario, $tipoInciencia, $prioridadInciencia, $estadoInciencia, $empresaInciencia, $textoIncidencia, $idI)
    {
        $this->db->set('idTecnico', $idTecnico);
        $this->db->set('idUsuario', $idUsuario);
        $this->db->set('tipo', $tipoInciencia);
        $this->db->set('prioridad', $prioridadInciencia);
        $this->db->set('estado', $estadoInciencia);
        $this->db->set('texto', $textoIncidencia);
        $this->db->set('empresa', $empresaInciencia);
        $this->db->where('id', $idI);

        if ($this->db->update('incidencia'))
        return true;
        else
            return false;
    }

    public function deleteUsuario($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("usuario")) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteTecnico($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("tecnico")) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteIncidencia($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("incidencia")) {
            return true;
        } else {
            return false;
        }
    }

}
?>