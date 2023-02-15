<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_User;
use App\Models\M_Pegawai;
use App\Models\M_Role;

class DataUser extends BaseController
{
    public function __construct()
    {
        $this->model = new M_User();
        $this->pegawai = new M_Pegawai();
        $this->role = new M_Role();
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datauser'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'User',
            'datauser' => $this->model->getAllData(),
            'datapegawai' => $this->pegawai->getAllData(),
            'datarole' => $this->role->getAllData(),
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/user', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {

        if($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[50]|alpha_space|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.'  ,
                    'alpha_space' => '{field} Tidak boleh selain huruf dan spasi!!' ,
                    'is_unique' => '{field} Sudah Ada, Input {field} Lain!!'     
                    ]
                ],
           
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|exact_length[6]|numeric|is_natural',
                    'errors' => [
                        'required' => '{field} Harus diisi!!',
                        'exact_length' => '{field} harus {param} digit',
                        'numeric' => '{field} harus berupa angka',  
                        'is_natural' => '{field} harus berupa angka positif'
                        ]
                    ],
                  
        ]))
        {
            //Jika Valid
            $data = [
                // 'id_pegawai' => $this->request->getPost('id_pegawai'),
                'id_pegawai' => $this->request->getPost('id_pegawai'),
                'id_role' => $this->request->getPost('id_role'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password')
            ];
               
            //insert data
            $success = $this->model->tambah($data);
            if ($success){
                return redirect()->to(base_url('datauser'));
            }
        } else {
            //Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datauser'));
        }
        
    }

    public function hapus()
    {
      $id_user = $this->request->getPost('id_user');  

        $success = $this->model->hapus($id_user);
        if ($success){
            session()->setFlashdata('message', ' dihapus');
            return redirect()->to(base_url('datauser'));
        }
    }

    public function ubah()
    {
        if($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[50]|alpha_space|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.'  ,
                    'alpha_space' => '{field} Tidak boleh selain huruf dan spasi!!' ,
                    'is_unique' => '{field} Sudah Ada, Input {field} Lain!!'     
                    ]
                ],
           
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|exact_length[6]|numeric|is_natural',
                    'errors' => [
                        'required' => '{field} Harus diisi!!',
                        'exact_length' => '{field} harus {param} digit',
                        'numeric' => '{field} harus berupa angka',  
                        'is_natural' => '{field} harus berupa angka positif'
                        ]
                    ],
                  
        ]))

        {
            //Jika Valid
            
        $id_user = $this->request->getPost('id_user');
        
        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'id_pegawai' => $this->request->getPost('id_pegawai'),
            'id_role' => $this->request->getPost('id_role'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_user);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datauser'));
        }
        } else {
            //Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datauser'));
        }


    }


  
}