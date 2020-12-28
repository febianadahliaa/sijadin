<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('auth_model');
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->auth_model->getUser();
        $data['perjadin'] = $this->perjadin_model->getAll();
        
        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('profile', $data);
        $this->load->view('partials_/footer');
    }
}

?>