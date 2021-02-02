<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Input_perjadin extends CI_Controller
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
		$data['title'] = 'Input Perjadin Pegawai';
		$data['subMenuName'] = 'Input Perjadin';
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_user'] = $this->perjadin_model->getUser();
		$data['data_attr'] = $this->perjadin_model->getAttr();

		$this->load->view('partials_/header', $data);
		$this->load->view('partials_/sidebar', $data);
		$this->load->view('partials_/topbar', $data);
		$this->load->view('perjadin_pegawai/input_perjadin', $data);
		$this->load->view('partials_/footer');
	}

	public function searchUser()
	{
		$nip = $_GET['nip'];
		$pengguna = $this->perjadin_model->getUserByNip($nip)->result();
		echo json_encode($pengguna);
	}

	public function searchAct($attr_id)
	{
		echo $this->perjadin_model->getActByAttr($attr_id);
	}

	public function searchOthersAct($attr_id)
	{
		echo $this->perjadin_model->getOthersActByAttr($attr_id);
	}

	public function getKode($attr_id, $act_id)
	{
		echo $this->perjadin_model->getKode($attr_id, $act_id)->activity_code;
	}

	public function add()
	{
		$config = [
			[
				'field' => 'nip',
				'label' => 'NIP',
				'rules' => 'required',
				'errors' => [
					'required' => 'NIP belum dipilih'
				],
			],
			[
				'field' => 'activity',
				'label' => 'Kegiatan',
				'rules' => 'required',
				'errors' => [
					'required' => 'Jenis Kegiatan belum dipilih'
				],
			],
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

		if ($this->form_validation->run()) {
			$nip = $this->input->post('nip');
			$date = $this->input->post('date');

			if ($this->perjadin_model->existDataCheck($nip, $date)->num_rows() < 1) {
				$this->perjadin_model->insert();
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('perjadin_pegawai/input_perjadin');
			} else {
				$this->session->set_flashdata('danger', 'Data pegawai pada tanggal tersebut sudah ada. Silahkan pilih tanggal lain.');
				redirect('perjadin_pegawai/input_perjadin');
			}
		} else {
			$data['title'] = 'Input Perjadin';
			$data['subMenuName'] = 'Input Perjadin';
			$data['data_user'] = $this->perjadin_model->getUser();
			$data['data_attr'] = $this->perjadin_model->getAttr();

			$this->load->view('partials_/header', $data);
			$this->load->view('partials_/sidebar', $data);
			$this->load->view('partials_/topbar', $data);
			$this->load->view('perjadin_pegawai/input_perjadin', $data);
			$this->load->view('partials_/footer');
		}
	}
}
