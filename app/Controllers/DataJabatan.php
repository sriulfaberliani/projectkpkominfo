<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Jabatan;

class DataJabatan extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Jabatan();
        
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datajabatan'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Jabatan',
            'datajabatan' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/jabatan', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {

        if($this->validate([
            'nama_jabatan' => [
                'label' => 'Nama Jabatan',
                'rules' => 'required|max_length[50]|is_unique[jabatan.nama_jabatan]|alpha_numeric_space',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.'  ,
                    'is_unique' => '{field} Sudah Ada, Input {field} Lain!!',
                    'alpha_numeric_space' => '{field} Tidak boleh selain huruf, angka dan spasi!!'      
                    ]
                ]
                
        ]))
        {
            //Jika Valid
            $data = [
                'nama_jabatan' => $this->request->getPost('nama_jabatan')
            ];
               
            //insert data
            $success = $this->model->tambah($data);
            if ($success){
                session()->setFlashdata('message', ' ditambahkan');
                return redirect()->to(base_url('datajabatan'));
            }
        } else{
            //Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datajabatan'));
        }
    }

    public function ubah()
    {

        if($this->validate([
            'nama_jabatan' => [
                'label' => 'Nama Jabatan',
                'rules' => 'required|max_length[50]|alpha_numeric_space',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.'  ,
                    'alpha_numeric_space' => '{field} Tidak boleh selain huruf, angka dan spasi!!'      
                    ]
                ]
                
        ]))
        {
            //Jika Valid
            $id_jabatan = $this->request->getPost('id_jabatan');
        
            $data = [
                'id_jabatan' => $this->request->getPost('id_jabatan'),
                'nama_jabatan' => $this->request->getPost('nama_jabatan')
                
            ];
               
            //update  data
            $success = $this->model->ubah($data, $id_jabatan);
            if ($success){
                session()->setFlashdata('message', ' diubah');
                return redirect()->to(base_url('datajabatan'));
            }
        } else{
            //Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datajabatan'));
        }

       


    }

      //Hapus data
      public function hapus()
      {
        $id_jabatan = $this->request->getPost('id_jabatan');  

          $success = $this->model->hapus($id_jabatan);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datajabatan'));
          }
      }
}