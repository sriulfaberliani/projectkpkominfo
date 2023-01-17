<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_User;
use App\Models\M_Pegawai;
use App\Models\M_Role;

class DataUser extends BaseController
{
    public function __construct()
    {
        $this->model = new M_User();
        $this->pegawai = new M_Pegawai();
        $this->role = new M_Role();
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datauser'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'User',
            'datauser' => $this->model->getAllData(),
            'datapegawai' => $this->pegawai->getAllData(),
            'datarole' => $this->role->getAllData(),
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/user', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_role' => $this->request->getPost('id_role'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
           
        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            return redirect()->to(base_url('datauser'));
        }
    }

    public function hapus()
    {
      $id_user = $this->request->getPost('id_user');  

        $success = $this->model->hapus($id_user);
        if ($success){
            session()->setFlashdata('message', ' dihapus');
            return redirect()->to(base_url('datauser'));
        }
    }


  
}