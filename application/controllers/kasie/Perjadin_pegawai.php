<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perjadin_pegawai extends CI_Controller
{
	public function __constuct()
	{
		parent::__constuct();
		$this->load->model('perjadin_model');
		$this->load->library('form_validation');
		// if($this->kasie_model->isNotLogin()) redirect(site_url('kasie/login'));
	}

	public function index()
	{
		$data['perjadin'] = $this->perjadin_model->getAll();
		$this->load->view('kasie/perjadin/list', $data);
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

		$this->load->view('kasie/perjadin/input_perjadin');
	}

	public function edit($idPerjadin = null)
	{
		if (!isset($idPerjadin)) redirect('kasie/perjadin');

		$perjadin = $this->perjadin_model;
		$validation = $this->form_validation;
		$validation->set_rules($perjadin->rules());

		if ($validation->run()) {
			$perjadin->update();
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}

		$this->load->view('kasie/perjadin/list', $data);
	}

	public function delete($idPerjadin = null)
	{
		if (!isset($idPerjadin)) show_404();
		if ($this->perjadin_model->delete($idPerjadin)) {
			redirect(site_url('kasie/perjadin/list'));
		}
	}
}

?>

