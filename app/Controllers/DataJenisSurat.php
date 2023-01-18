<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_JenisSurat;

class DataJenisSurat extends BaseController
{

    public function __construct()
    {
        $this->model = new M_JenisSurat();
        
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datajenisSurat'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Jenis Surat',
            'datajenissurat' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/jenissurat', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'nama_jenisSurat' => $this->request->getPost('nama_jenisSurat')
        ];
           
        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->to(base_url('datajenissurat'));
        }


    }

    public function ubah()
    {
        
        $data = [
            'id_jenisSurat' => $this->request->getPost('id_jenisSurat'),
            'nama_jenisSurat' => $this->request->getPost('nama_jenisSurat')
            
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_jenisSurat);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datajenissurat'));
        }


    }

      //Hapus data
      public function hapus()
      {
        $id_jenisSurat = $this->request->getPost('id_jenisSurat');  

          $success = $this->model->hapus($id_jenisSurat);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datajenissurat'));
          }
      }
}