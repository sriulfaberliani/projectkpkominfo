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
            'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat')
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
        $id_jenis_surat = $this->request->getPost('id_jenis_surat');
        
        $data = [
            'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
            'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat')
            
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_jenis_surat);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datajenissurat'));
        }


    }

      //Hapus data
      public function hapus()
      {
        $id_jenis_surat = $this->request->getPost('id_jenis_surat');  

          $success = $this->model->hapus($id_jenis_surat);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datajenissurat'));
          }
      }
}