<?php

defined('BASEPATH') or exit('No direct access script allowed');

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('manajemen_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Kegiatan';
        $data['data_atribut'] = $this->manajemen_model->getAttr();
        $data['data_kegiatan_origin'] = $this->manajemen_model->getOriAct();
        $data['data_kegiatan'] = $this->manajemen_model->getAct();

        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('manajemen/list_kegiatan', $data);
        $this->load->view('partials_/footer');
    }

    public function addAttr()
    {
        echo 'true';
    }

    public function addOriAct()
    {
        echo 'true';
    }

    public function addAct()
    {
        echo 'true';
    }

    public function delAttr($attrId)
    {
        if (!isset($attrId)) show_404();
        if ($this->manajemen_model->deleteAttr($attrId)) {
            redirect('manajemen/kegiatan');
        }
    }

    public function delOriAct($oriActId)
    {
        if (!isset($oriActId)) show_404();
        if ($this->manajemen_model->deleteOriAct($oriActId)) {
            redirect('manajemen/kegiatan');
        }
    }

    public function delAct($actId)
    {
        if (!isset($actId)) show_404();
        if ($this->manajemen_model->deleteAct($actId)) {
            redirect('manajemen/kegiatan');
        }
    }
}
