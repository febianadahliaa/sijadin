<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = 
		$jabatan = 
		// saat form login disubmit
        if($this->input->post()){
            if ($jabatan) {
            	# code...
            }

            if($this->user_model->doLogin()) redirect(site_url('admin'));
        }




		$this->load->view('login_page');
	}

	public function auth()
	{
		$email = $this->input->post('email', TRUE);
		$password = md5()
	}
}

?>