<?php

class Overview extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// $this->load->model('perjadin_model');
		//if($this->kasie_model->isNotLogin()) redirect(site_url('kasie/login'));
	}

	public function index()
	{
		$this->load->view('kasie/perjadinku'); //load halaman view tabel perjadin dari kasie
	}
}

?>