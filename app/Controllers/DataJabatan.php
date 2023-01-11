<?php

namespace App\Controllers;

class DataJabatan extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Jabatan'
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/jabatan');
        echo view('templates/v_footer');
    }
}