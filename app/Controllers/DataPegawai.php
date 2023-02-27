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
            redirect()->to(base_url('datapegawai'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Pegawai',
            'datapegawai' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/pegawai', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        if($this->validate([
            'nama_pegawai' => [
                'label' => 'Nama Pegawai',
                'rules' => 'required|max_length[50]|alpha_space',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.',
                    'alpha_space' => '{field} Tidak boleh selain huruf dan spasi!!'
                    
                    ]
                ],
           
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required|max_length[18]|numeric|is_natural|is_unique[pegawai.nip]',
                    'errors' => [
                        'required' => '{field} Harus diisi!!',
                        'exact_length' => '{field} tidak boleh melebihi {param} digit.',
                        'numeric' => '{field} harus berupa angka',
                        'is_natural' => '{field} harus berupa angka positif',
                        'is_unique' => '{field} Sudah Ada, Input {field} Lain!!'

                        ]
                    ],
                    
                  

                'no_hp' => [
                    'label' => 'Nomor Handphone',
                    'rules' => 'required|max_length[13]|numeric|is_natural|is_unique[pegawai.no_hp]',
                    'errors' => [
                        'required' => '{field} Harus diisi!!',
                        'exact_length' => '{field} tidak boleh melebihi {param} digit.',
                        'numeric' => '{field} harus berupa angka',
                        'is_natural' => '{field} harus berupa angka positif',
                        'is_unique' => '{field} Sudah Ada, Input {field} Lain!!'
                        ]
                    ]
        ]))
        {
            //jika valid
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
                session()->setFlashdata('message', ' ditambahkan');
                return redirect()->to(base_url('datapegawai'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datapegawai'));
        }


    }

    public function ubah()
    {
        if($this->validate([

            'nama_pegawai' => [
                'label' => 'Nama Pegawai',
                'rules' => 'required|max_length[50]|alpha_space',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.',
                    'alpha_space' => '{field} Tidak boleh selain huruf dan spasi!!'
                    
                    ]
                ],
           
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required|max_length[18]|numeric|is_natural',
                    'errors' => [
                        'required' => '{field} Harus diisi!!',
                        'max_length' => '{field} tidak boleh melebihi {param} digit.',
                        'numeric' => '{field} harus berupa angka',
                        'is_natural' => '{field} harus berupa angka positif'
                        ]
                    ],
                    
                  

                'no_hp' => [
                    'label' => 'Nomor Handphone',
                    'rules' => 'required|max_length[13]|numeric|is_natural',
                    'errors' => [
                        'required' => '{field} Harus diisi!!',
                        'exact_length' => '{field} tidak boleh melebihi {param} digit.',
                        'numeric' => '{field} harus berupa angka',
                        'is_natural' => '{field} harus berupa angka positif'
                        ]
                    ]
        ]))
       {
        //jika valid
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
       } else {
        //jika tidak valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
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