<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perjadin_pegawai extends CI_Controller
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
		$data['data_perjadin'] = $this->perjadin_model->getAll();
		$this->load->view('kasie/perjadin_pegawai/list_perjadin', $data);
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

		$this->load->view('kasie/perjadin_pegawai/edit_perjadin', $data);
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

