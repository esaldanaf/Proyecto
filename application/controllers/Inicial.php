<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicial extends CI_Controller
{

    public function index()
    {
        $datos['titulo'] = 'Codeigniter con ajax';
        $this->load->view('index', $datos);
        
    }
}
?>