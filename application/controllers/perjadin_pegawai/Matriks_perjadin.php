<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Matriks_perjadin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('auth_model');
        $this->load->model('perjadin_model');
    }

    public function index()
    {
        $data['title'] = 'Matriks Perjadin Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perjadin'] = $this->perjadin_model->getAll();
        $data['maxMinYear'] = $this->perjadin_model->getMaxMinYear();

        $this->load->view('partials_/header', $data);
        $this->load->view('partials_/sidebar', $data);
        $this->load->view('partials_/topbar', $data);
        $this->load->view('perjadin_pegawai/matriks_perjadin', $data);
        $this->load->view('partials_/footer');
    }

    public function tableMatrix($year, $month)
    {
        if ($year != '0' && $month != '0') {
            if ($month < 10) {
                $month = '0' . $month;
            }
            $user = $this->perjadin_model->getUser();
            $matrix = $this->perjadin_model->getMatrixByMonth($year, $month);
            $days = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
            $table = '';
            $table .= '<thead class="thead-dark">';
            $table .= '<tr>';
            $table .= '<th class="text-right" scope="col">Nama</th>';
            for ($day = 1; $day <= $days; $day++) {
                $table .= '<th>' . $day . '</th>';
            }
            $table .= '</tr>';
            $table .= '</thead>';
            $table .= '<tbody>';
            foreach ($user as $key => $u) {
                $table .= '<tr>';
                $table .= '<td class="text-right"><span class="badge badge-dark">' . $u->name . '</span></td>';
                for ($day = 1; $day <= $days; $day++) {
                    $result = '';
                    foreach ($matrix as $m) {
                        if (date('d', strtotime($m->date)) == $day && $m->date != null && $u->nip == $m->nip) {
                            $result .= '&#10003;';
                            break;
                        } else {
                            $result .= '';
                        }
                    }
                    $table .= '<td><span class="badge badge-success">' . $result . '</span></td>';
                    echo $result;
                }
                $table .= '</tr>';
            }
            $table .= '</tbody>';
        } else {
            $table = '';
            $table .= '<thead class="thead-dark">';
            $table .= '<tr>';
            $table .= '<th class="text-right" scope="col">Nama</th>';
            for ($day = 1; $day <= 11; $day++) {
                if ($day >= 7) {
                    $table .= '<th>' . ($day + 20) . '</th>';
                } else if ($day > 5 && $day < 7) {
                    $table .= '<th>...</th>';
                } else {
                    $table .= '<th>' . $day . '</th>';
                }
            }
            $table .= '</tr>';
            $table .= '</thead>';
            $table .= '<tbody>';
            $table .= '<tr>';
            $table .= '<td class="text-center" colspan="20">Silakan pilih bulan dan tahun!</td>';
            $table .= '</tr>';
            $table .= '</tbody>';
        }
        echo $table;
    }
}
