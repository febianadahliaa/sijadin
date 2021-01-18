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

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->auth_model->getUserByEmail($email);

			if ($user) {
				if (password_verify($password, $user['password'])) {
					//Jika berhasil login, maka data yang disimpan dalam session
					$data = [
						'email' => $user['email'],
						'roleId' => $user['role_id'],
						'nip' => $user['nip'],
						'pos' => $user['position'],
						'name' => $user['name'],
						'gender' => $user['gender']
					];
					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) { //admin
						redirect('manajemen/pegawai');
					} elseif ($user['role_id'] == 2) { //kasie
						redirect('perjadin_pegawai/list_perjadin');
					} else {
						redirect('perjadin_saya');
					}
				} else {
					$this->session->set_flashdata('error', 'Password salah!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('error', 'Email tidak terdaftar!');
				redirect('auth');
			}
		} else {
			$data['title'] = 'Login Pengguna';
			$this->load->view('partials_/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('partials_/auth_footer');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('roleId');
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('position');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('gender');

		$this->session->set_flashdata('message', 'Anda sudah keluar!');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = 'Halaman tidak ditemukan';
		$data['user'] = $this->auth_model->getUser();

		$this->load->view('partials_/header', $data);
		$this->load->view('partials_/sidebar', $data);
		$this->load->view('partials_/topbar', $data);
		$this->load->view('auth/blocked');
		$this->load->view('partials_/footer');
	}

	public function changePassword()
	{
		$data['title'] = 'Ganti Password';
		$data['user'] = $this->auth_model->getUser();

		$config = [
			[
				'field' => 'currentPassword',
				'label' => 'Password Lama',
				'rules' => 'trim|required',
				'errors' => [
					'required' => 'Password lama harus diisi!'
				],
			],
			[
				'field' => 'newPassword1',
				'label' => 'Password Baru',
				'rules' => 'trim|required|min_length[6]',
				'errors' => [
					'required' => 'Password baru harus diisi!',
					'min_length' => 'Panjang minimal 6 karakter!'
				],
			],
			[
				'field' => 'newPassword2',
				'label' => 'Konfirmasi Password',
				'rules' => 'trim|required|matches[newPassword1]',
				'errors' => [
					'required' => 'Konfirmasi password harus diisi!',
					'matches' => 'Password tidak sama!'
				],
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == false) {
			$this->load->view('partials_/header', $data);
			$this->load->view('partials_/sidebar', $data);
			$this->load->view('partials_/topbar', $data);
			$this->load->view('auth/change-password');
			$this->load->view('partials_/footer');
		} else {
			$current_password = $this->input->post('currentPassword');
			$new_password = $this->input->post('newPassword1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('error', 'Password lama tidak sesuai!');
				redirect('auth/changePassword');
			} else {
				if ($new_password == $current_password) {
					$this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan password lama!');
					redirect('auth/changePassword');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->auth_model->updatePassword($password_hash);
					$this->session->set_flashdata('message', 'Password berhasil diubah!');
					redirect('auth/changePassword');
				}
			}
		}
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
