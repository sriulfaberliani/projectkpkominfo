<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_JabatanPegawai;

class DataJabatanPegawai extends BaseController
{
    public function __construct()
    {
        $this->model = new M_JabatanPegawai();
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('DataJabatanPegawai'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Jabatan - Pegawai',
            'jabatanPegawai' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/jabatan-pegawai', $data);
        echo view('templates/v_footer');
    }
}