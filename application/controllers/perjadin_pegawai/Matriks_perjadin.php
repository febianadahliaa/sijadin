<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Matriks_perjadin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('auth_model');
        $this->load->model('perjadin_model');
    }

    public function index()
    {
        $data['title'] = 'Matriks Perjadin';
        $data['user'] = $this->auth_model->getUser();
        $data['perjadin'] = $this->perjadin_model->perjadinMatrix();
        
        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('perjadin_pegawai/matriks_perjadin', $data);
        $this->load->view('partials_/footer');
    }
}

?>