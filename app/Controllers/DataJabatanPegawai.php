<?php

namespace App\Controllers;

class DataJabatanPegawai extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Jabatan - Pegawai'
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/jabatan-pegawai');
        echo view('templates/v_footer');
    }
}