<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_JabatanPegawai;
use App\Models\M_Pegawai;
use App\Models\M_Jabatan;

class DataJabatanPegawai extends BaseController
{
    public function __construct()
    {
        $this->model = new M_JabatanPegawai();
        $this->pegawai = new M_Pegawai();
        $this->jabatan = new M_Jabatan();
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('DataJabatanPegawai'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Jabatan - Pegawai',
            'jabatanPegawai' => $this->model->getAllData(),
            'pegawai' => $this->pegawai->getAllData(),
            'jabatan' => $this->jabatan->getAllData(),
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/jabatan-pegawai', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            // 'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
        ];
           
        //insert data
        $success = $this->model->tambah($data);
        if ($success){
            return redirect()->to(base_url('datajabatanpegawai'));
        }
    }

    public function hapus()
      {
        $id_jabatan_pegawai = $this->request->getPost('id_jabatan_pegawai');  

          $success = $this->model->hapus($id_jabatan_pegawai);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datajabatanpegawai'));
          }
      }

      public function ubah()
    {
        $id_jabatan_pegawai = $this->request->getPost('id_jabatan_pegawai');
        
        $data = [
            'id_jabatan_pegawai' => $this->request->getPost('id_jabatan_pegawai'),
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_jabatan' => $this->request->getPost('id_jabatan')
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_jabatan_pegawai);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datajabatanpegawai'));
        }
    }
}