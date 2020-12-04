<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Input_perjadin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('perjadin_model');
		// $this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Input Perjadin Pegawai';
		$data['data_user'] = $this->perjadin_model->getUser();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('perjadin/input_perjadin', $data);
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

		$this->load->view('kasie/input_perjadin');
	}
}

?>