<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class List_perjadin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('perjadin_model');
		$this->load->library('form_validation');
		// if($this->kasie_model->isNotLogin()) redirect(site_url('kasie/login'));
	}

	public function index()
	{
		$data['title'] = 'Daftar Perjadin Pegawai';
		$data['data_perjadin'] = $this->perjadin_model->getAll();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
		$this->load->view('perjadin/list_perjadin', $data);
        $this->load->view('partials_/footer');
	} //read data

	public function edit($idPerjadin = null)
	{
		$data['perjadin'] = $this->perjadin_model->getAll();
		if (!isset($idPerjadin)) redirect('kasie/perjadin_pegawai');

		$perjadin = $this->perjadin_model;
		$validation = $this->form_validation;
		$validation->set_rules($perjadin->rules());

		if ($validation->run()) {
			$perjadin->update();
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}

		$data['title'] = 'Edit Perjadin Pegawai';
		$this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
		$this->load->view('perjadin/edit_perjadin', $data);
        $this->load->view('partials_/footer');
	}

	public function delete($idPerjadin = null)
	{
		if (!isset($idPerjadin)) show_404();
		if ($this->perjadin_model->delete($idPerjadin)) {
			redirect(site_url('kasie/perjadin_pegawai'));
		}
	}
}

?>

