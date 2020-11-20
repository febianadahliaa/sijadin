<?php

class Perjadinku extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('perjadin_model');
		//if($this->kasie_model->isNotLogin()) redirect(site_url('kasie/login'));
	}

	public function index()
	{
		$data['perjadin'] = $this->perjadin_model->getAll();
		$this->load->view('kasie/perjadinku', $data); //load halaman view tabel perjadin dari kasie
	}
}

?>