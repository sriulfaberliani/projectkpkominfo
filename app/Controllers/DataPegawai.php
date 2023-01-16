<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Pegawai;

class DataPegawai extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Pegawai();
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('DataPegawai'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Pegawai',
            'datapegawai' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/pegawai', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'nip' => $this->request->getPost('nip'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp')
        ];
           

        

        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            return redirect()->to(base_url('datapegawai'));
        }


    }

    public function ubah()
    {
        $id_pegawai = $this->request->getPost('id_pegawai');
        
        $data = [
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'nip' => $this->request->getPost('nip'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp')
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_pegawai);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datapegawai'));
        }


    }

      //Hapus data
      public function hapus()
      {
        $id_pegawai = $this->request->getPost('id_pegawai');  

          $success = $this->model->hapus($id_pegawai);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datapegawai'));
          }
      }
}