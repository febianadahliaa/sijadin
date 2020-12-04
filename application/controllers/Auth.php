<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('auth_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run()) {
			$this->auth_model->login();
		} else {
			$data['title'] = 'Login Pengguna';
			$this->load->view('partials_/auth_header', $data);
			$this->load->view('login');
			$this->load->view('partials_/auth_footer');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', 'Anda sudah keluar!');
		redirect('auth');
	}


	
	// ??? 

	// public function register()
	// {
	// 	$this->form_validation->set_rules('name', 'Name', 'required|trim');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]');
	// 	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
	// 		'is_unique' => 'This email already registered'
	// 	]);
	// 	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
	// 		'min_length' => 'Password too short',
	// 		'matches' => 'Password is not match!'
	// 	]);

	// 	if($this->form_validation->run() == false) {
	// 		$data['title'] = 'User Registration';
	// 		$this->load->view('partials_/auth_header', $data);
	// 		$this->load->view('auth/register');
	// 		$this->load->view('partials_/auth_footer');
	// 	} else {
	// 		$data = [
	//			'nama' => htmlspecialchars($this->input->post('name', true)),
	// 			'email' => htmlspecialchars($this->input->post('email', true)),
	// 			// 'image' => 'default.jpg',
	// 			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
	// 			'role_id' => 3,
	// 			// 'is_active' => 0,
	// 		];

	// 		$this->db->insert('pengguna', $data);
	// 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! Your ccount has been created. Please Login</div>');
	// 		redirect('auth');
	// 	}
	// }
}

?>