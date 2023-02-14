<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Sifat;

class DataSifat extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Sifat();
        
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datasifat'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Sifat',
            'datasifat' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/sifat_dispo', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'nama_sifat' => $this->request->getPost('nama_sifat')
        ];
           
        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->to(base_url('datasifat'));
        }


    }

    public function ubah()
    {
        $id_sifat = $this->request->getPost('id_sifat');
        
        $data = [
            'id_sifat' => $this->request->getPost('id_sifat'),
            'nama_sifat' => $this->request->getPost('nama_sifat')
            
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_sifat);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datasifat'));
        }


    }

      //Hapus data
      public function hapus()
      {
        $id_sifat = $this->request->getPost('id_sifat');  

          $success = $this->model->hapus($id_sifat);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datasifat'));
          }
      }
}