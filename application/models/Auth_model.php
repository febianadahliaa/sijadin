<?php

class Auth_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        $query = $this->db->select('user.*, user_position.position')
            ->from('user')
            ->where('email', $email)
            ->join('user_position', 'user.position_id = user_position.id', 'Left')
            ->get();
        return $query->row_array();
    }

    public function getUser()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }

    public function updatePassword($password_hash)
    {
        $this->db->set('password', $password_hash)
            ->where('email', $this->session->userdata('email'))
            ->update('user');
    }

    public function isLogin()
    {
        return $this->session->userdata() === null;
    }
}
