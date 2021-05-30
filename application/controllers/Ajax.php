<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function crearBoton()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('404');
        } else {
            $respuestas         = array();
            $input              = $this->input->post("mensaje");
            $respuestas['html'] = "<div>Hola " . $input . "</div>";

            echo json_encode($respuestas);
            exit();
        }
    }
}
?>