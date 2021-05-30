<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ChatModel extends CI_Model {

    public function listarUsuarios(){
        $this->db->select('*');
        $this->db->from('usuario');
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;

    }

    public function chatUsuario($uId, $tId)
    {
        $this->db->select('*');
        $this->db->from('mensajeria');
        $this->db->where('idUsuario', $uId);
        $this->db->where('idTecnico', $tId);
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

    public function chatTecnico($uId, $tId){
        $this->db->select('*');
        $this->db->from('mensajeria');
        $this->db->where('idUsuario',$uId);
        $this->db->where('idTecnico', $tId);
        $resultado = $this->db->get();
        $array = $resultado->result_array();
        return $array;
    }
    
    public function insertarChat($idTecnicoChat, $idUsuarioChat, $emisorChat, $mensajeChat){
        $data = array(
            'idTecnico ' => $idTecnicoChat,
            'idUsuario ' => $idUsuarioChat,
            'emisor' => $emisorChat,
            'mensaje' => $mensajeChat,
        );

        if ($this->db->insert('mensajeria', $data)) {
            return true;
        } else {
            return false;
        }
    }

    

}
?>