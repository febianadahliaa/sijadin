<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('session');
        // $this->load->library('form_validation');
        $this->load->model('menu_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaturan Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->menu_model->getAll();
        
        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('partials_/footer');
    }
    
    public function add()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run()) {
            $this->menu_model->addMenu();
            $this->session->set_flashdata('message', 'Menu baru berhasil ditambahkan.');
            redirect('menu');
        } else {
            $this->session->set_flashdata('error', 'Menu tidak boleh kosong!');
            redirect('menu');
        }
    }

    public function edit()
    {
        // $data['menu'] = $this->menu_model->getMenuById($id);
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run()) {
            // $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            
            $id = $this->input->post('id');
            $data = array('menu' => $this->input->post('menu'));
            $this->menu_model->editMenu($data, $id);
            
            $this->session->set_flashdata('message', 'Menu berhasil diedit.');
            redirect('menu');
        } else {
            $this->session->set_flashdata('error', 'Menu tidak boleh kosong!');
            redirect('menu');
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->menu_model->deleteMenu($id);
        $data['menu'] = $this->menu_model->getAll();
        $this->session->set_flashdata('message', 'Menu ' . $menu['menu'] . ' berhasil dihapus.'); //BELOM BERHASIL
        redirect('menu');
    }

}

?>