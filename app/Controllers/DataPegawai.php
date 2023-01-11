<?php

namespace App\Controllers;

class DataPegawai extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Pegawai'
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/pegawai');
        echo view('templates/v_footer');
    }
}