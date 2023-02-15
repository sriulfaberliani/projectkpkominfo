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

        if (session()->get('id_role') == '1' || session()->get('id_role') == '4') {
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
        if($this->validate([
            'nama_sifat' => [
                'label' => 'Sifat',
                'rules' => 'required|is_unique[sifat_dispo.nama_sifat]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ])) {
            $data = [
                'nama_sifat' => $this->request->getPost('nama_sifat')
            ];
            $this->model->tambah($data);
            session()->setFlashdata('message', ' ditambahkan');
            return redirect()->to(base_url('datasifat'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datasifat'));
        }
        
    }

    public function ubah()
    {
        $id_sifat = $this->request->getPost('id_sifat');
        if($this->validate([
            'nama_sifat' => [
                'label' => 'Sifat Disposisi',
                'rules' => 'required|is_unique[sifat_dispo.nama_sifat,id_sifat,'.$id_sifat.']',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
        ])) {
            $data = [
                'nama_sifat' => $this->request->getPost('nama_sifat')
            ];
            $this->model->ubah($data, $id_sifat);
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datasifat'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
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