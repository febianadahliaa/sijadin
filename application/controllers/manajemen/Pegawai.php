<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('manajemen_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Pegawai';
        $data['subMenuName'] = 'Pegawai';
        $data['data_pegawai'] = $this->manajemen_model->getUser();

        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('manajemen/list_pegawai', $data);
        $this->load->view('partials_/footer');
    }

    public function add()
    {
        $data['title'] = 'Input Data Pegawai';
        $data['subMenuName'] = 'Pegawai';
        $data['data_role'] = $this->manajemen_model->getRole();
        $data['data_position'] = $this->manajemen_model->getPosition();

        $config = [
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'trim|required|exact_length[9]|is_unique[user.nip]',
                'errors' => [
                    'required' => 'NIP harus diisi!',
                    'exact_length' => 'Panjang NIP adalah 9 karakter!',
                    'is_unique' => 'Data pegawai sudah ada!'
                ]
            ],
            [
                'field' => 'name',
                'label' => 'Nama Pegawai',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pegawai harus diisi!'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Panjang password minimal 6 karakter!'
                ]
            ],
            [
                'field' => 'roleId',
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role belum dipilih!'
                ]
            ],
            [
                'field' => 'gender',
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin belum dipilih!'
                ]
            ],
            [
                'field' => 'positionId',
                'label' => 'Jabatab',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan belum dipilih!'
                ]
            ],
            [
                'field' => 'phone',
                'label' => 'Nomor HP',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor HP harus diisi!'
                ]
            ],
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->load->view('partials_/header', $data);
            $this->load->view('partials_/sidebar', $data);
            $this->load->view('partials_/topbar', $data);
            $this->load->view('manajemen/input_pegawai', $data);
            $this->load->view('partials_/footer');
        } else {
            $this->manajemen_model->insertUser();
            $this->session->set_flashdata('message', 'Data pegawai baru berhasil disimpan.');
            redirect('manajemen/pegawai/add');
        }
    }

    public function delete($userId)
    {
        if (!isset($userId)) show_404();
        if ($this->manajemen_model->deleteUser($userId)) {
            redirect('manajemen/pegawai');
        }
    }

    public function resetPassword()
    {
        $config = [
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Panjang password minimal 6 karakter!'
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        $userId = $this->input->post('nip');

        if ($this->form_validation->run()) {
            $this->manajemen_model->updatePassword($userId);
            $this->session->set_flashdata('message', 'Password berhasil diganti.');
        } else {
            $this->session->set_flashdata('error', 'Password gagal diganti. Cek panjang karakter!');
        }
        redirect('manajemen/pegawai');
    }
}
