<?php

class Input_perjadin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('kasie/input_perjadin'); //load halaman input perjadin
	}
}

?>