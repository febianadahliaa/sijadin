<?php

defined('BASEPATH') or exit('No direct script access allowed');

class List_perjadin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('auth_model');
		$this->load->model('perjadin_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Daftar Perjadin Pegawai';
		$data['subMenuName'] = 'List Perjadin';
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_user'] = $this->perjadin_model->getUser();
		$data['data_attr'] = $this->perjadin_model->getAttr();
		$data['data_perjadin'] = $this->perjadin_model->getAll();

		$this->load->view('partials_/header', $data);
		$this->load->view('partials_/sidebar', $data);
		$this->load->view('partials_/topbar', $data);
		$this->load->view('perjadin_pegawai/list_perjadin', $data);
		$this->load->view('partials_/footer');
	} //read data

	public function edit()
	{
		$config = [
			[
				'field' => 'date',
				'label' => 'Tanggal',
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal belum dipilih'
				],
			],
		];
		$this->form_validation->set_rules($config);

		$perjadin_id = $this->input->post('perjadin_id');
		$nip = $this->perjadin_model->getById($perjadin_id)->nip;
		$date = $this->input->post('date');

		$data = array(
			'date' => $date
		);

		if ($this->form_validation->run()) {
			if ($this->perjadin_model->existDataCheck($nip, $date)->num_rows() < 1) {
				if ($this->perjadin_model->update($data, $perjadin_id)) { //update data
					$this->session->set_flashdata('success', 'Data berhasil disimpan');
					redirect(site_url('perjadin_pegawai/list_perjadin'));
				}
				$this->session->set_flashdata('danger', 'Data gagal disimpan. Terjadi error saat disimpan.');
				redirect(site_url('perjadin_pegawai/list_perjadin'));
			}
			$this->session->set_flashdata('danger', 'Data gagal disimpan. Pegawai pada tanggal tersebut sudah ada. Silahkan pilih tanggal lain!');
			redirect(site_url('perjadin_pegawai/list_perjadin'));
		}
		$this->session->set_flashdata('danger', 'Data gagal disimpan.');
		redirect(site_url('perjadin_pegawai/list_perjadin'));
	}

	public function delete($idPerjadin)
	{
		if (!isset($idPerjadin)) show_404();
		if ($this->perjadin_model->delete($idPerjadin)) {
			redirect(site_url('perjadin_pegawai/list_perjadin'));
		}
	}
}
