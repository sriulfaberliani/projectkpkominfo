<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Pegawai;

class DataPegawai extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Pegawai();
    }

    public function index()
    {

        $data = [
            'title' => 'Pegawai',
            'pegawai' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/pegawai', $data);
        echo view('templates/v_footer');
    }
}