<?php

class Auth_model extends CI_Model
{
    public function login()
	{
        $email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ]; //Jika berhasil login, maka data disimpan dalam session
                $this->session->set_userdata($data);
                
				if ($user['role_id'] == 1) { //admin
                    redirect('menu');
                } elseif ($user['role_id'] == 2) { //kasie
                    redirect('perjadin_pegawai/list_perjadin');
                } else {
                    redirect('perjadin_saya');
                }
			} else {
				// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				$this->session->set_flashdata('error', 'Password salah!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('error', 'Email tidak terdaftar!');
			redirect('auth');
		}
	}

	public function getUser()
	{
		$query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
		return $query->row_array();
	}
}

?>