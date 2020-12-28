<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Input_perjadin extends CI_Controller
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
		$data['title'] = 'Input Perjadin';
		$data['user'] = $this->auth_model->getUser();

		$this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('perjadin_pegawai/input_perjadin', $data);
        $this->load->view('partials_/footer');
	}

	public function searchUser(){
        $nip=$_GET['nip'];
        $pengguna = $this->perjadin_model->getUserByNip($nip)->result();
        echo json_encode($pengguna);
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

		$this->load->view('perjadin_pegawai/input_perjadin');
	}
}

?>