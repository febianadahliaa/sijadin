<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Input_perjadin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('perjadin_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('kasie/perjadin_pegawai/input_perjadin');
	}

	public function add()
	{
		$perjadin = $this->perjadin_model;			//objek model Perjadin_model
		$validation = $this->form_validation;		//objek validasi
		$validation->set_rules($perjadin->rules()); //terapkan rules

		if ($validation->run()) {
			$perjadin->save(); //simpan data ke db
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		} //jika validasi lancar

		$this->load->view('kasie/perjadin_pegawai/input_perjadin');
	}
}

?>