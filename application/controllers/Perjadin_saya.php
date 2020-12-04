<?php

class Perjadin_saya extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('perjadin_model');
		//if($this->kasie_model->isNotLogin()) redirect(site_url('kasie/login'));
	}

	public function index()
	{
		$data['title'] = 'Daftar Perjadin Saya';
		$data['data_perjadin'] = $this->perjadin_model->getAll();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('perjadin_saya/index', $data);
        $this->load->view('partials_/footer');
	}

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

?>