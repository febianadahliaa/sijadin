<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Matriks_perjadin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('perjadin_model');
    }

    public function index()
    {
        $data['perjadin'] = $this->perjadin_model->getAll();
        $this->load->view('kasie/perjadin_pegawai/matriks_perjadin', $data);
    }
}

?>