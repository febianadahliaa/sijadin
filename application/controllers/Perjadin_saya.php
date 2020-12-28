<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perjadin_saya extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('auth_model');
		$this->load->model('perjadin_model');
	}

	public function index()
	{
		$data['title'] = 'Perjadin Saya';
		$data['user'] = $this->auth_model->getUser();
		$data['data_perjadin'] = $this->perjadin_model->getAll();
        
        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('perjadin_saya/index', $data);
        $this->load->view('partials_/footer');
	}
}

?>