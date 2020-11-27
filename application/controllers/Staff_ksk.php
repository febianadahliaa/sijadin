<?php

class Staff_ksk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('perjadin_model');
		//if($this->kasie_model->isNotLogin()) redirect(site_url('kasie/login'));
	}

	public function index()
	{
		$data['title'] = 'Daftar Perjadin Saya';
		$data['data_perjadin'] = $this->perjadin_model->getAll();
        
        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('staff_ksk/index', $data);
        $this->load->view('partials_/footer', $data);
	}
}

?>