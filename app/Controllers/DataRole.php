<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Role;

class DataRole extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Role();
        
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datarole'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'role',
            'datarole' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/role', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'level' => $this->request->getPost('level')
        ];
           

        

        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->to(base_url('datarole'));
        }


    }

    public function ubah()
    {
        $id_role = $this->request->getPost('id_role');
        
        $data = [
            'id_role' => $this->request->getPost('id_role'),
            'level' => $this->request->getPost('level')
            
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_role);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datarole'));
        }


    }

      //Hapus data
      public function hapus()
      {
        $id_role = $this->request->getPost('id_role');  

          $success = $this->model->hapus($id_role);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datarole'));
          }
      }
}