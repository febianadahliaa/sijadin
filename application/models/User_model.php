<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{	
	// private $mytable = 'users';
	// public $nama;
	// public $username;
	// public $paswword;
	// public $email;
	// public $jabatan;

	public function doLogin()
	{
		$post = $this->input->post();

		// mecari user berdasarkan username dan email
		$this->db->where('username', $post['username'])->or_where('email', $post['email']);
		$user = $this->db->get($this->mytable)->row();

		if ($user) {
			$isPasswordTrue = password_verify($post['password'], $user->password); //cek password
			// $isKasie = $user->jabatan == 'kasie';
			// $isKepala = $user->jabatan == 'kepala';
			// $isStaff = $user->jabatan == 'staff';
			// $isKsks = $user->jabatan == 'ksk';

			if ($isPasswordTrue /*&& $isKasie*/) {
				$this->session->set_userdata(['user_logged' => $user]);
				return true;
			}
		}
		return false; //login gagal
	}

	public function isNotLogin()
	{
		return $this->session->userdata('user_logged') === null;
	}
}

?>