<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Role;

class DataRole extends BaseController
{

    public function __construct()
    {
        $this->model = new M_Role();
        
    }

    public function index()
    {

        if (session()->get('id_role') == '1') {
            redirect()->to(base_url('datarole'));
        } else {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => 'Role/Level',
            'datarole' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo \view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Data_Master/role', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        if($this->validate([
            'level' => [
                'label' => 'Level',
                'rules' => 'required|max_length[50]|alpha_numeric_space|is_unique[role.level]',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.'  ,
                    'alpha_numeric_space' => '{field} Tidak boleh selain huruf, angka dan spasi!!' ,
                    'is_unique' => '{field} Sudah Ada, Input {field} Lain!!'     
                    ]
                ]
                
        ]))
        {
            //Jika Valid
            $data = [
                'level' => $this->request->getPost('level')
            ];
               
            //insert data
            $success = $this->model->tambah($data);
            if ($success){
                session()->setFlashdata('message', ' ditambahkan');
                return redirect()->to(base_url('datarole'));
            }
        }
        else
        {
            //Jika Tidak Valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('datarole'));
        }

       


    }

    public function ubah()
    {
        if($this->validate([
            'level' => [
                'label' => 'Level',
                'rules' => 'required|max_length[50]|alpha_numeric_space',
                'errors' => [
                    'required' => '{field} Harus diisi!!',
                    'max_length' => '{field} tidak boleh melebihi {param} karakter.'  ,
                    'alpha_numeric_space' => '{field} Tidak boleh selain huruf, angka dan spasi!!'      
                    ]
                ]
                
        ]))
        {
            //Jika valid
            $id_role = $this->request->getPost('id_role');
        
        $data = [
            'id_role' => $this->request->getPost('id_role'),
            'level' => $this->request->getPost('level')
            
        ];
           
        //update  data
        $success = $this->model->ubah($data, $id_role);
        if ($success){
            session()->setFlashdata('message', ' diubah');
            return redirect()->to(base_url('datarole'));
        }

        }else{
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('datarole'));
        }
        


        


    }

      //Hapus data
      public function hapus()
      {
        $id_role = $this->request->getPost('id_role');  

          $success = $this->model->hapus($id_role);
          if ($success){
              session()->setFlashdata('message', ' dihapus');
              return redirect()->to(base_url('datarole'));
          }
      }
}