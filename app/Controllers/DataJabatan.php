<?php

namespace App\Controllers;
use App\Models\M_Jabatan;

class DataJabatan extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Jabatan();
        
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('DataJabatan'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Jabatan',
            'jabatan' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/jabatan', $data);
        echo view('templates/v_footer');
    }
}