<?php

defined('BASEPATH') or exit('No direct script access allowed');

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

		if ($this->form_validation->run() == false) {
			// validation failed
			$data['title'] = 'Login Pengguna';
			$this->load->view('partials_/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('partials_/auth_footer');
		} else {
			// validation success
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('pengguna', ['email' => $email])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role_id' => $user['idPeran'],
				];
				$this->session->set_userdata($data);
				if ($user['idPeran'] == 1) {
					redirect('kasie');
				} elseif ($user['idPeran'] == 2) {
					redirect('kepala');
				} else {
					redirect('staff_ksk');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah keluar!</div>');
		redirect('auth');
	}



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
