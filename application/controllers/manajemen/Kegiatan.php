<?php

defined('BASEPATH') or exit('No direct access script allowed');

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('manajemen_model');
        $this->load->model('perjadin_model');
    }

    public function index()
    {
        $data['title'] = 'Managemen Kegiatan';
        $data['subMenuName'] = 'Kegiatan';
        $data['data_atribut'] = $this->manajemen_model->getAttr();
        $data['data_kegiatan_origin'] = $this->manajemen_model->getOriAct();
        $data['data_kegiatan'] = $this->manajemen_model->getAct();
        $data['data_attr'] = $this->perjadin_model->getAttr();
        $data['data_act'] = $this->perjadin_model->getAct();

        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('manajemen/list_kegiatan', $data);
        $this->load->view('partials_/footer');
    }

    public function addAttr()
    {
        $config = [
            [
                'field' => 'codeAttr',
                'label' => 'Code Attribute',
                'rules' => 'trim|required|exact_length[3]|is_unique[attribute.attribute_id]',
                'errors' => [
                    'required' => 'Harus diisi!',
                    'exact_length' => 'Panjang 3 karakter!',
                    'is_unique' => 'Kode Atribut sudah ada!'
                ]
            ],
            [
                'field' => 'nameAttr',
                'label' => 'Name Attribute',
                'rules' => 'trim|is_unique[attribute.attribute]',
                'errors' => [
                    'is_unique' => 'Nama Atribut sudah ada!'
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        $data = [
            'attribute_id' => $this->input->post('codeAttr'),
            'attribute' => $this->input->post('nameAttr'),
        ];

        if ($this->form_validation->run()) {
            $this->manajemen_model->insertAttr($data);
            $this->session->set_flashdata('message', 'Atribut baru berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Atribut gagal dibuat! Data sudah ada atau panjang karakter tidak sesuai.');
        }
        redirect('manajemen/kegiatan/');
    }

    public function addOriAct()
    {
        $config = [
            [
                'field' => 'codeOriAct',
                'label' => 'Code Origin Activity',
                'rules' => 'trim|required|exact_length[3]|is_unique[activity.activity_id]',
                'errors' => [
                    'required' => 'Harus diisi!',
                    'exact_length' => 'Panjang 3 karakter!',
                    'is_unique' => 'Data sudah ada!'
                ]
            ],
            [
                'field' => 'nameOriAct',
                'label' => 'Name Origin Activity',
                'rules' => 'trim|is_unique[activity.activity]',
                'errors' => [
                    'is_unique' => 'Nama Atribut sudah ada!'
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        $data = [
            'activity_id' => $this->input->post('codeOriAct'),
            'activity' => $this->input->post('nameOriAct'),
        ];

        if ($this->form_validation->run()) {
            $this->manajemen_model->insertOriAct($data);
            $this->session->set_flashdata('message', 'Kegiatan Origin baru berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Kegiatan Origin gagal dibuat! Data sudah ada atau panjang karakter tidak sesuai.');
        }
        redirect('manajemen/kegiatan/');
    }

    public function addAct()
    {
        $config = [
            [
                'field' => 'codeAct',
                'label' => 'Code Activity',
                'rules' => 'trim|required|exact_length[4]|is_unique[activity_code.activity_code]',
                'errors' => [
                    'required' => 'Harus diisi!',
                    'exact_length' => 'Panjang 4 karakter!',
                    'is_unique' => 'Data sudah ada!'
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        $data = [
            'activity_code' => $this->input->post('codeAct'),
            'attribute_id' => $this->input->post('addAttr'),
            'activity_id' => $this->input->post('addAct'),
        ];

        if ($this->form_validation->run()) {
            $this->manajemen_model->insertAct($data);
            $this->session->set_flashdata('message', 'Kegiatan baru berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Kegiatan gagal dibuat! Data sudah ada atau panjang karakter tidak sesuai.');
        }
        redirect('manajemen/kegiatan/');
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
