<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Status;

class DataStatus extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Status();
        
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datastatus'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Status',
            'datastatus' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/status_dispo', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'status' => $this->request->getPost('status')
        ];
           
        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->to(base_url('datastatus'));
        }


    }

    public function ubah()
    {
        $id_status = $this->request->getPost('id_status');
        
        $data = [
            'id_status' => $this->request->getPost('id_status'),
            'status' => $this->request->getPost('status')
            
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_status);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datastatus'));
        }


    }

      //Hapus data
      public function hapus()
      {
        $id_status = $this->request->getPost('id_status');  

          $success = $this->model->hapus($id_status);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datastatus'));
          }
      }
}