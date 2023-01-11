<?php

namespace App\Controllers;

class DataAkun extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Akun'
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/akun');
        echo view('templates/v_footer');
    }
}