<?php

class Auth_model extends CI_Model
{
    public function cek_login($email)
    {
        $hasil = $this->db->where('email', $email)->limit(1)->get('pengguna');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function isNotLogin()
    {
        return $this->session->userdata('email') === null;
    }
}
