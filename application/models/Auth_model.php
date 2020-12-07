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
                //Jika berhasil login, maka data yang disimpan dalam session
                $data = [
                    'email' => $user['email'],
                    'roleId' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                
				if ($user['role_id'] == 1) { //admin
                    redirect('menu');
                } elseif ($user['role_id'] == 2) { //kasie
                    redirect('perjadin/list_perjadin');
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


    // ??? //
    
    public function isNotLogin(){
        // return $this->session->userdata('user_logged') === null;
        return $this->session->userdata() === null;
    }

    // public function cek_login($email)
    // {
    //     $hasil = $this->db->where('email', $email)->limit(1)->get('users');
    //     if ($hasil->run_rows() > 0) {
    //         return $hasil->row();
    //     } else {
    //         return array();
    //     }
    // }
}

?>