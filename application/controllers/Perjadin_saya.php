<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perjadin_saya extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('auth_model');
		$this->load->model('perjadin_model');
	}

	public function index()
	{
		$data['title'] = 'Daftar Perjadin Saya';
		$data['subMenuName'] = 'Perjadin Saya';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->perjadin_model->getByNip($this->session->userdata('nip'))) {
			$data['data_perjadin'] = $this->perjadin_model->getByNip($this->session->userdata('nip'));
		} else {
			$data['data_perjadin'] = 'Tidak Ada Perjadin!';
		}

		$this->load->view('partials_/header', $data);
		$this->load->view('partials_/sidebar', $data);
		$this->load->view('partials_/topbar', $data);
		$this->load->view('perjadin_saya/index', $data);
		$this->load->view('partials_/footer');
	}

	// public function filterMonth($month)
	// {
	// 	$q = $this->perjadin_model->getMyPerjadinByMonth($this->session->userdata('nip'), $month);
	// 	echo json_encode($q);
	// }

	// public function perjadinSaya()
	// {
	// 	$q = $this->perjadin_model->getByNip($this->session->userdata('nip'));
	// 	echo json_encode($q);
	// }

	// public function edit($idPerjadin = null)
	// {
	// 	$data['perjadin'] = $this->perjadin_model->getAll();
	// 	if (!isset($idPerjadin)) redirect('kasie');

	// 	$perjadin = $this->perjadin_model;
	// 	$validation = $this->form_validation;
	// 	$validation->set_rules($perjadin->rules());

	// 	if ($validation->run()) {
	// 		$perjadin->update();
	// 		$this->session->set_flashdata('success', 'Data berhasil disimpan');
	// 	}

	// 	$this->load->view('partials_/header', $data);
	//     $this->load->view('partials_/sidebar', $data);
	//     $this->load->view('partials_/topbar', $data);
	//     $this->load->view('kasie/edit_perjadin', $data);
	//     $this->load->view('partials_/footer');
	// }

	// public function delete($idPerjadin = null)
	// {
	// 	if (!isset($idPerjadin)) show_404();
	// 	if ($this->perjadin_model->delete($idPerjadin)) {
	// 		redirect(site_url('kasie'));
	// 	}
	// }
}
