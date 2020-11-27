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
        $data['title'] = 'Matriks Perjadin Pegawai';
        $data['perjadin'] = $this->perjadin_model->getAll();
        
        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('kasie/matriks_perjadin', $data);
        $this->load->view('partials_/footer', $data);
    }
}

?>