<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class List_perjadin extends CI_Controller
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
		$data['title'] = 'List Perjadin';
		$data['user'] = $this->auth_model->getUser();
		$data['perjadin_data'] = $this->perjadin_model->getAll();
		
		// $time = $this->input->post('year_month');
		// $data['perjadin_data'] = $this->perjadin_model->getByTime($time);

		$this->load->view('partials_/header', $data);
		$this->load->view('partials_/sidebar', $data);
		$this->load->view('partials_/topbar', $data);
		$this->load->view('perjadin_pegawai/list_perjadin', $data);
		$this->load->view('partials_/footer');
	} //all data
	
	public function dataByTime()
	{
		$data['title'] = 'List Perjadin';
		$data['user'] = $this->auth_model->getUser();
		
		$time = $this->input->post('year_month');
		$data['perjadin_data'] = $this->perjadin_model->getByTime($time);
		
		// if ($time) {
			$this->load->view('partials_/header', $data);
			$this->load->view('partials_/sidebar', $data);
			$this->load->view('partials_/topbar', $data);
			$this->load->view('perjadin_pegawai/list_perjadin_short', $data);
			$this->load->view('partials_/footer');
		// } else {
		// 	redirect('perjadin_pegawai/list_perjadin');
		// }
	} //data by month & year

	public function edit($idPerjadin = null)
	{
		$data['perjadin'] = $this->perjadin_model->getAll();
		if (!isset($idPerjadin)) redirect('perjadin_pegawai/list_perjadin');

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
		$this->load->view('perjadin_pegawai/edit_perjadin', $data);
        $this->load->view('partials_/footer');
	}

	public function delete($idPerjadin = null)
	{
		if (!isset($idPerjadin)) show_404();
		if ($this->perjadin_model->delete($idPerjadin)) {
			redirect(site_url('perjadin_pegawai/list_perjadin'));
		}
	}
}

?>

