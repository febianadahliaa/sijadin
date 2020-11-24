<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function loginForm()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors());
			$this->session->set_flashdata('input', $this->input->post());
			redirect('auth');
		} else {
			
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));
			$cek_login = $this->auth_model->cek_login($email);

			if ($cek_login == false) {
				$this->session->set_flashdata('error_login', 'Email yang Anda masukkan tidak terdaftar.');
				redirect('auth'); 
			} else {
				
				if(password_verify($password, $cek_login->password)) {
					$this->session->set_flashdata('nip', $cek_login->nip);
					$this->session->set_flashdata('nama', $cek_login->nama);
					$this->session->set_flashdata('email', $cek_login->email);
					$this->session->set_flashdata('jabatan', $cek_login->jabatan);

					redirect('/category');
				} else {
					$this->session->set_flashdata('error_login', 'Email atau password yang Anda masukan salah.');
					redirect('auth');
				}

			}

		}
	}
	
	public function logout()
	{
		
	}
}

?>