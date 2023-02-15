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

        if (session()->get('id_role') == '1' || session()->get('id_role') == '4' ) {
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
        if($this->validate([
            'nama_jenis_surat' => [
                'label' => 'Jenis Surat',
                'rules' => 'required|is_unique[jenissurat.nama_jenis_surat]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ])) {
            $data = [
                'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat')
            ];
            //insert data
            $success = $this->model->tambah($data);
            if ($success){
                session()->setFlashdata('message', ' ditambahkan');
                return redirect()->to(base_url('datajenissurat'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('DataJenisSurat'));
        }
       
    }

    public function ubah()
    {
        $id_jenis_surat = $this->request->getPost('id_jenis_surat');
        if($this->validate([
            'nama_jenis_surat' => [
                'label' => 'Jenis Surat',
                'rules' => 'required|is_unique[jenissurat.nama_jenis_surat]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ])) {
            $data = [
                'id_jenis_surat' => $this->request->getPost('id_jenis_surat'),
                'nama_jenis_surat' => $this->request->getPost('nama_jenis_surat')
            ];
            //insert data
            $success = $this->model->ubah($data, $id_jenis_surat);
            if ($success){
                session()->setFlashdata('message', ' diubah');
                return redirect()->to(base_url('datajenissurat'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('DataJenisSurat'));
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